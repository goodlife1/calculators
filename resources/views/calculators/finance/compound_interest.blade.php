@extends('layouts.app')

@section('content')
    <div class="container">
    <form class="col-md-3" action="" method="post" role="form">
        <legend>Form Title</legend>

        <div class="form-group">
            <label for="currency">Currency</label>
            <input type="text" class="form-control" name="" id="currency" placeholder="Input...">
        </div><div class="form-group">
            <label for="principal_amount">Principal amount</label>
            <input type="text" class="form-control" name="" id="principal_amount" placeholder="Input...">
        </div><div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="" id="" placeholder="Input...">
        </div><div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="" id="" placeholder="Input...">
        </div><div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="" id="" placeholder="Input...">
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    @endsection
@push('script')
<script>

    function doCalc()
    {
        zeroBlanks(document.mainform);
        var p = parseFloat($('#currency').val());
        var c = parseFloat($('#principal_amount').val());
        var r = numval(document.mainform.r.value)/100;
        var y = numval(document.mainform.y.value);
        var n = numval(document.mainform.n.value);

        if (document.mainform.addTiming[0].checked)
            document.mainform.fv.value = formatNumber(basicInvestment(p,r/n,y*n,c/n),2);
        else
            document.mainform.fv.value = formatNumber(bI2(p,r/n,y*n,c/n),2);
    }


    function bI2(p,r,y,c)
    {
        if (c == null) c = 0;
        if (y == 0) return p;
        return futureValue(p,r,y) + c*geomSeries(1+r,0,y-1);
    }

    function basicInvestment(p,r,y,c)
    {
        if (c == null) c = 0;

        return futureValue(p,r,y) + c*geomSeries(1+r,1,y);
    }
    function futureValue(p,r,y)
    {
        return p*Math.pow(1+r,y);
    }
    function geomSeries(z,m,n)
    {
        var amt;
        if (z == 1.0) amt = n + 1;
        else amt = (Math.pow(z,n + 1) - 1)/(z - 1);
        if (m >= 1) amt -= geomSeries(z,0,m-1);
        return amt;
    }
    //-->
</script>
@endpush