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
                            <form method="post" @if(isset($page))action="/admin/pages/{{$page->id}}"
                                  @else action="/admin/pages" @endif>
                                @if(isset($page))
                                    {{method_field('put')}}
                                @endif
                                {{csrf_field()}}
                                <div class="col-md-6">
                                    <div class="form-group col-ms-5">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug"
                                               placeholder="name-or" value="{{ @$page->slug }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="view">View</label>
                                        <input type="text" name="view" class="form-control" id="view"
                                               placeholder="view-path" value="{{ @$page->view }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="form-control "
                                                style="width: 100%;">

                                            @foreach($categoryes as $category)
                                                <option disabled="disabled">{{$category->name_en}}</option>
                                                @forelse($category->subCategory() as $sub_cat)
                                                    <option @if( @$page->category_id ==$sub_cat->id) selected @endif
                                                    value="{{$sub_cat->id}}">{{$sub_cat->name_en}}</option>
                                                @empty
                                                @endforelse
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="panel box box-primary">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                                   aria-expanded="false" class="collapsed">
                                                    English
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false"
                                             style="height: 0px;">
                                            <div class="box-body">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" class="form-control" id="name"
                                                               placeholder="view-path" value="{{ @$page->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" class="form-control" id="title"
                                                               placeholder="view-path" value="{{ @$page->title }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Meta</label>
                                                        <textarea name="meta" class="form-control" rows="3"
                                                                  placeholder="Enter ...">{{@$page->meta}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea name="description" class="form-control" rows="3"
                                                                  placeholder="Enter ..."> {{ @$page->description }}</textarea>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        for image
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <textarea id="editor1" name="content" rows="10"
                                                              cols="80">{{ @$page->content }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="panel box box-primary">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTho"
                                                   aria-expanded="false" class="collapsed">
                                                    Руский
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTho" class="panel-collapse collapse" aria-expanded="false"
                                             style="height: 0px;">
                                            <div class="box-body">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="name">Имя</label>
                                                        <input type="text" name="name_ru" class="form-control"
                                                               id="name_ru"
                                                               placeholder="view-path" value="{{ @$page->name_ru }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Титулка</label>
                                                        <input type="text" name="title_ru" class="form-control"
                                                               id="title_ru"
                                                               placeholder="view-path" value="{{ @$page->title_ru }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Meta</label>
                                                        <textarea name="meta_ru" class="form-control" rows="3"
                                                                  placeholder="Enter ...">{{ @$page->meta_ru }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea name="description_ru" class="form-control" rows="3"
                                                                  placeholder="Enter ...">{{ @$page->description_ru }}</textarea>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        for image
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                    <textarea id="editor1_ru" name="content_ru" rows="10" cols="80">
                        {{ @$page->content_ru }}
                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

        if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
            document.getElementById( 'ie8-warning' ).className = 'tip alert';
        }


        CKEDITOR.replace('editor1_ru');


    });


</script>
@endpush