<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDon;
use App\CanHo;
use App\DichVu;
use App\ChiTietHoaDon;
use DB;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoadon=DB::select('SELECT  hoadon.tong_tien, hoadon.id, canho.name as canhoname, hoadon.created_at, hoadon.tinh_trang_tt FROM hoadon, canho WHERE hoadon.can_ho_id=canho.id  ');
        return view('hoa-don.danh-sach-hoa-don')->with('hoadon',$hoadon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canho=CanHo::all();
        $dichvu=DichVu::all();
        $tongtien = DB::select('SELECT SUM(thanh_tien) as tongtien from chitiethoadon,hoadon where chitiethoadon.hoa_don_id=hoadon.id');
        $thanhtien=DB::select('SELECT dichvu.phi_dv*so_luong as thanhtien from chitiethoadon,dichvu where chitiethoadon.dich_vu_id=dichvu.id' );
        return view('hoa-don.them-moi-hoa-don',compact('canho','dichvu','tongtien','thanhtien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'can_ho'=>'required',
            'dich_vu'=>'required',
            'so_luong'=>'required',
            // 'tong_tien'=>'required', 
            'tinh_trang_tt'=>'required', 
            // 'thanh_tien'=>'required', 
        ]);
        
        $hoadon = new HoaDon;
        $hoadon->can_ho_id =$request ->input('can_ho');
        // $hoadon->tong_tien=$request->input('tong_tien');
        $hoadon->tong_tien=10000;
        $hoadon->tinh_trang_tt=$request->input('tinh_trang_tt');
        $hoadon->nhan_vien_id=1;
        $hoadon->save();
        
        $cthoadon = new ChiTietHoaDon;
        $cthoadon->hoa_don_id=$hoadon->id;
        $cthoadon->can_ho_id =$request ->input('can_ho');
        $cthoadon->dich_vu_id=$request->input('dich_vu');
        $cthoadon->so_luong=$request->input('so_luong');
        // $cthoadon->thanh_tien=$request->input('thanh_tien');
        //$cthoadon->dich_vu_id->phi_dv * $cthoadon->so_luong;
        $cthoadon->thanh_tien= 200000;
        $cthoadon->save();

        return redirect('hoa-don')->with('success','Add success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hoadon = HoaDon::find($id);
        $dichvu->delete();

        return redirect('hoa-don-vu')->with('success','Delete success');
    }
}
