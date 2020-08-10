@extends('layout')
@section('title')
    Sửa tin tức
@endsection
@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                
                    <h4 class="page-title">Sửa tin tức</h4>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
            @if($errors->any())
                 {{$errors}}
                @endif
                {!!Form::open(['action' => ['TinTucController@update',$tintuc->id],'method'=> 'PUT']) !!}
                'enctype'=> 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('title','Nội dung')}}<span class="text-danger"> 
                        *</span>
                        <div class="form-group">
                            {{Form::Text('noi_dung_tt','',['class'=> 'form-control','placeholder'=>'Nhập nội dung'])}}
                        </div> 
                        </div>
                        <div class="form-group">
                            {{Form::label('title','Ảnh minh họa')}}<span class="text-danger"> *</span>
                        <div class="form-group">
                            <input type="file" class= 'form-control' name='anh_dai_dien'/>
                            <label> <b>Lưu ý:<u></u> </b><small srylr="color:red">Chỉ chọn file có phần mở rộng: png, img, jpg</small></label>
                        </div> 
                        @if(session('success'))
                        <p style="color:red"> {{ session('success') }} </p>
                        @endif
                    </div>
                    {{Form::submit('Lưu',['class'=>'btn btn-success waves-effect waves-light'])}}
                    {{Form::button('Hủy',['class'=>'btn btn-purple waves-effect waves-light'])}}
                    {!!Form::close() !!}
            </div>
        </div>
    </div>
@endsection