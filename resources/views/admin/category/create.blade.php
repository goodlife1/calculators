@extends('admin.layouts.admin-template')

@push('style')
<link rel="stylesheet" href="{{asset('/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- Include Editor style. -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_editor.min.css' rel='stylesheet'
      type='text/css'/>
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_style.min.css' rel='stylesheet'
      type='text/css'/>

<!-- Include JS file. -->
@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>


        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <form method="post" @if(isset($cat))action="/admin/category/{{$cat->id}}"
                                  @else action="/admin/category" @endif>
                                @if(isset($cat))
                                    {{method_field('put')}}
                                @endif
                                {{csrf_field()}}
                                <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group col-ms-5">
                                        <label for="name_en">Name EN</label>
                                        <input type="text" name="name_en" class="form-control" id="name_en"
                                               placeholder="name-or" value="{{ @$cat->name_en }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-ms-5">
                                        <label for="namt_ru">Name Ru</label>
                                        <input type="text" name="name_ru" class="form-control" id="name_ru"
                                               placeholder="name-or" value="{{ @$cat->name_ru }}">
                                    </div>
                                </div>
                                </div>

                                    <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group col-ms-5">
                                        <label for="image_path">image_path</label>
                                        <input type="text" name="image_path" class="form-control" id="image_path"
                                               placeholder="name-or" value="{{ @$cat->image_path }}">
                                    </div>
                                </div>
                                <div class="col-md-6" style="min-height: 20px">
                                    <div class="form-group col-ms-5">
                                        <label for="main_cat">Main Category?</label>
                                        <input type="checkbox" name="main_category"
                                               {{@$cat->main_category?'checked':''}}    id="main_cat"
                                               value="1">
                                    </div>
                                </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group col-ms-5">
                                            <label for="slug">Slug</label>
                                            <input type="text" name="slug" class="form-control" id="slug"
                                                   placeholder="name-or" value="{{ @$cat->slug }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="main_category_id" class="form-control "
                                                    style="width: 100%;">
                                                <option value="0"></option>
                                                @foreach($categoryes as $category)
                                                    <option {{@$cat->main_category_id == $category->id?'selected':''}}
                                                            value="{{$category->id}}">{{$category->name_en}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12" style="padding:30px 15px ">
                                    <label for="editor1">Description En</label>
                                    <textarea id="editor1" name="description_en" rows="10"
                                              cols="80">{{ @$cat->description_en }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="editor1_ru"> Description Ru</label>

                                    <textarea id="editor1_ru" name="description_ru" rows="10"
                                              cols="80">{{ @$cat->description_ru }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success">

                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@push('script')
<script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type='text/javascript'
        src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/js/froala_editor.min.js'></script>

<script src="/bower_components/ckeditor/ckeditor.js"></script>
<script src="/bower_components/ckeditor/config.js"></script>
<script>
    $(function () {
        $('.select2').select2()

    });
    $(function () {



        // Toolbar groups configuration.
        CKEDITOR.replace('editor1');

//        CKEDITOR.replace( 'editor1', {
//            extraPlugins: 'mathjax',
//            mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
//            height: 320
//        } );

        if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
            document.getElementById('ie8-warning').className = 'tip alert';
        }


        CKEDITOR.replace('editor1_ru');


    });


</script>
@endpush