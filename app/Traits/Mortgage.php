<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 31.01.2018
 * Time: 16:13
 */
namespace App\Traits;

use Carbon\Carbon;

Trait Mortgage
{

    public function mortgageShadule($request)
    {
        $start_date = Carbon::parse($request->date_init);
        $number_mounth = $request->term * 12;
        $monthly_rate = $request->rate / 12 / 100;
        $monthly_payment = round((($monthly_rate * $request->amount) / (1 - pow((1 + $monthly_rate), -$number_mounth))), 2);
        $total_interest_paid = $monthly_payment * $number_mounth - $request->amount;
        $monthly_shadyle = [];
        $yearly_shadule = [];
        $total_loan_payment = $total_interest_paid + $request->amount;
        for ($i = 1; $i < $number_mounth + 1; $i++) {
            $start_date->month++;
            $interest = $this->getInterest($request, $i, $monthly_rate, $monthly_payment);
            $ending_balance = $request->amount * (pow(1 + $monthly_rate, $number_mounth) - pow(1 + $monthly_rate, $i)) / (pow(1 + $monthly_rate, $number_mounth) - 1);
            $monthly_shadyle[$i]['date'] = $start_date->format('Y-m');
            $monthly_shadyle[$i]['interest'] = round($interest - $this->getInterest($request, $i - 1, $monthly_rate, $monthly_payment), 2);
            $monthly_shadyle[$i]['ending_balance'] = round($ending_balance, 2);
            $monthly_shadyle[$i]['starting_balance'] = $i == 1 ? (int)$request->amount : $monthly_shadyle[$i - 1]['ending_balance'];
            $monthly_shadyle[$i]['principal'] = round($monthly_shadyle[$i]['starting_balance'] - $monthly_shadyle[$i]['ending_balance'], 2);
        }
        $start_date = Carbon::parse($request->date_init);
        for ($n = 12, $i = 1; $i < $request->term + 1; $n += 12, $i++) {
            $start_date->year++;
            $interest = $this->getInterest($request, $n, $monthly_rate, $monthly_payment);
            $ending_balance = $request->amount * (pow(1 + $monthly_rate, $number_mounth) - pow(1 + $monthly_rate, $n)) / (pow(1 + $monthly_rate, $number_mounth) - 1);
            $yearly_shadule[$i]['date'] = $start_date->format('Y');
            $yearly_shadule[$i]['interest'] = round($interest - $this->getInterest($request, $n - 12, $monthly_rate, $monthly_payment), 2);
            $yearly_shadule[$i]['ending_balance'] = round($ending_balance, 2);
            $yearly_shadule[$i]['starting_balance'] = $i == 1 ? (int)$request->amount : $yearly_shadule[$i - 1]['ending_balance'];
            $yearly_shadule[$i]['principal'] = round($yearly_shadule[$i]['starting_balance'] - $yearly_shadule[$i]['ending_balance'], 2);
        }
        $data['yearly'] = $yearly_shadule;
        $data['monthly'] = $monthly_shadyle;
        $data['monthly_paymant'] = $monthly_payment;
        $data['total_loan_payment'] = $total_loan_payment;
        $data['total_interest'] = $total_interest_paid;
        return $data;
    }


    protected function getInterest($request, $month_number, $monthly_rate, $monthly_payment)
    {
        return ($request->amount * $monthly_rate - $monthly_payment) * ((pow(1 + $monthly_rate, $month_number) - 1) / $monthly_rate) + $monthly_payment * ($month_number);

    }

    protected function PMT($interest, $number_p, $paymant)
    {
        return abs(round($interest * $paymant * pow((1 + $interest), $number_p) / (1 - pow((1 + $interest), $number_p)), 4));
    }

    protected function paymantShadule($request)
    {
        $interest = $request->rate * 0.01 / 12;
        $month = $request->term * 12;
        $principal = $request->amount;
        $monthly = $this->PMT($interest, $month, $principal);
        $month_shadule = array();
        for ($i = 1; $i < $request->term * 12 + 1; $i++) {
            $month_shadule[$i]['month'] = $i;
            $month_shadule[$i]['startingBalance'] = $i == 1 ? $request->amount : $month_shadule[$i - 1]['endingBalance'];
            $month_shadule[$i]['interest'] = round($month_shadule[$i]['startingBalance'] * $interest, 2);
            $month_shadule[$i]['principal'] = round($monthly - $month_shadule[$i]['interest'], 2);
            $month_shadule[$i]['endingBalance'] = round($month_shadule[$i]['startingBalance'] - $month_shadule[$i]['principal'], 2);
            $month_shadule[$i]['totalInterest'] = $i == 1 ? $month_shadule[$i]['interest'] : round($month_shadule[$i]['interest'] + $month_shadule[$i - 1]['totalInterest'], 2);
        }
        $year_by_month = array_chunk($month_shadule, 12);
        $year_shdule = array();
        foreach ($year_by_month as $key=>$item) {

            $year_shdule[$key]['year'] = $key+1;
            $year_shdule[$key]['startingBalance'] = $key==0?$request->amount:$year_shdule[$key-1]['endingBalance'];
            $year_shdule[$key]['interest'] = round(array_sum(array_column($item, 'interest')),2);
            $year_shdule[$key]['principal'] = round(array_sum(array_column($item, 'principal')),2);
            $year_shdule[$key]['endingBalance'] =end($item)['endingBalance'];


        }
        $data['total_interest'] = round(array_sum(array_column($year_shdule, 'interest')));
        $data['yearly'] =$year_shdule;
        $data['monthly']=$month_shadule;
        $data['monthly_paymant'] = $monthly;
        $data['total_month_paymant']=$month;
        $data['total_paymants']=round($data['total_interest']+$request->amount,2);
        return $data;
    }

}
