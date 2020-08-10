@extends('layout')
@section('title')
    Thêm mới phương tiện
@endsection
@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                
                    <h4 class="page-title">Thêm mới phương tiện</h4>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <!-- <form
                    
                    <div class="form-group">
                        
                        <label>Nhãn hiệu phương tiện<span class="text-danger">*</span></label>
                        <input type="text"  placeholder="Nhập nhãn hiệu" class="form-control">
                        <label>Màu sắc<span class="text-danger">*</span></label>
                        <input type="text"  placeholder="Nhập màu sắc phương tiện" class="form-control">
                        <label>Biển số<span class="text-danger">*</span></label>
                        <input type="text"  placeholder="Nhập biển số" class="form-control">
                        <label>Khu vực<span class="text-danger">*</span></label>
                        <input type="text"  placeholder="Nhập khu vực" class="form-control">
                        <label>Loại phương tiện<span class="text-danger">*</span></label>
                        <input type="text  placeholder="Nhập loại phương tiện" class="form-control">
                        <label>Mã căn hộ<span class="text-danger">*</span></label>
                        <input type="text"  placeholder="Nhập mã căn hộ" class="form-control">
                        
                    </div>
                    <div class="form-group text-left mb-0">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Lưu</button>
                        <a href="#" class="btn btn-purple waves-effect waves-light">Hủy</a>
                    </div>
                </form> -->
                {!!Form::open(['action' => 'PhuongTienController@store','method'=> 'POST']) !!}
                    <div class="form-group">
                    {{Form::label('title','Nhãn hiệu phương tiện')}}<span class="text-danger"> 
                    *</span>
                    <div class="form-group">
                        {{Form::Text('nhan_hieu','',['class'=> 'form-control','placeholder'=>'Nhập nhãn hiệu'])}}
                    </div> 
                    </div>
                    <div class="form-group">
                    {{Form::label('title','Màu sắc')}}<span class="text-danger"> 
                    *</span>
                    <div class="form-group">
                        {{Form::Text('mau_sac','',['class'=> 'form-control','placeholder'=>'Nhập màu sắc'])}}
                    </div> 
                    </div>

                <div class="form-group">
                    {{Form::label('title','Biển số')}}<span class="text-danger"> 
                    *</span>
                    <div class="form-group">
                        {{Form::Text('bien_so','',['class'=> 'form-control','placeholder'=>'Nhập biển số'])}}
                    </div> 
                    </div>
                    <div class="form-group">
                    {{Form::label('title','Khu vực')}}<span class="text-danger"> 
                    *</span>
                    <div class="form-group">
                        <select class="form-control" id="canho" name="khu_vuc" required focus>
                        <option value="" disabled selected>Chọn khu vực</option>        
                        @foreach($khuvuc as $khu_vuc)
                        <option name="loaiphuongtien" value="{{$khu_vuc->id}}">{{ $khu_vuc->ten_khu_vuc }}</option>
                        @endforeach
                        </select>
                    </div> 
                    </div>
                    <div class="form-group">
                    {{Form::label('title','Loại phương tiện')}}<span class="text-danger"> 
                    *</span>
                    <div class="form-group">
                        <select class="form-control" id="canho" name="loai_phuong_tien" required focus>
                        <option value="" disabled selected>Chọn loại phương tiện</option>        
                        @foreach($loaiphuongtien as $loai_phuong_tien)
                        <option name="loaiphuongtien" value="{{$loai_phuong_tien->id}}">{{ $loai_phuong_tien->ten_loai_phuong_tien }}</option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                    {{Form::label('title','Loại dịch vụ')}}<span class="text-danger"> 
                    *</span>
                    <div class="form-group">
                        <select class="form-control" id="canho" name="khu_vuc" required focus>
                        <option value="" disabled selected>Chọn dịch vụ</option>        
                        @foreach($dichvu as $dich_vu)
                        <option name="dichvu" value="{{$khu_vuc->id}}">{{ $dich_vu->ten_dich_vu }}</option>
                        @endforeach
                        </select>
                    </div> 
                    </div>
    



                    </div>
                    <div class="form-group">
                    {{Form::label('title','Căn hộ')}}<span class="text-danger"> 
                    *</span>
                    <div class="form-group">
                        <select class="form-control" id="canho" name="can_ho" required focus>
                        <option value="" disabled selected>Chọn căn hộ</option>        
                        @foreach($canho as $can_ho)
                        <option name="canho" value="{{$can_ho->id}}">{{ $can_ho->id }}</option>
                        @endforeach
                        </select>
                    </div> 
                    </div>

                    
                    {{Form::submit('Lưu',['class'=>'btn btn-success waves-effect waves-light'])}}
                    {{Form::button('Hủy',['class'=>'btn btn-purple waves-effect waves-light'])}}
                    {!!Form::close() !!}
            </div>
        </div>
    </div>
@endsection