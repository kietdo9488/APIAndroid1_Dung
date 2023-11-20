<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    //
    public static function layTatCaNhanVienAPI()
    {
        return NhanVien::all();
    }

    public static function themNhanVienAPI(Request $request)
    {
        $hinh = $request->hinh;
        $hinh_name = 'images/' . self::myRandom() . "-" . now()->getTimestampMs() . '-' . 'nhanvien' . '.' . $hinh->extension();
        $hinh->move(public_path('images'), $hinh_name);
        return NhanVien::create([
            'hinh' => $hinh_name,
            'ho' => $request->ho,
            'ten' => $request->ten,
            'soDienThoai' => $request->soDienThoai,
            'soNgayLam' => 0,
            'tienLuongTheoNgay' => $request->tienLuongTheoNgay,
            'tienLuongTong' => 0,
            'tienLuongDaNhan' => 0,
            'tienLuongCanTra' => 0,
            'trangThai' => 0,
        ]);
    }

    public static function suaNhanVienAPI(Request $request)
    {
        $nhanVien = NhanVien::where('id', '=', $request->id)->first();
        if (isset($nhanVien)) {
            $hinh = $request->hinh;
            $image_name = 'images/' . time() . '-' . 'nhanvien' . '.' . $hinh->extension();
            $hinh->move(public_path('images'), $image_name);
            $ho = $request->ho;
            $ten = $request->ten;
            $soDienThoai = $request->soDienThoai;
            $soNgayLam = $request->soNgayLam;
            $tienLuongTheoNgay = $request->tienLuongTheoNgay;
            return $nhanVien->update(['ten' => $ten, 'ho' => $ho, 'hinh' => $image_name, 'soDienThoai' => $soDienThoai, 'soNgayLam' => $soNgayLam, 'tienLuongTheoNgay' => $tienLuongTheoNgay]);
        }
        return false;
    }

    public static function xoaNhanVien(Request $request)
    {
        return NhanVien::where('id', $request->id)->delete();
    }

    public function thayDoiTrangThai(Request $request)
    {
        $nhanVien = NhanVien::find($request->id);
        if ($nhanVien->trangThai == 0) {
            $nhanVien->trangThai  = 1;
        } else {
            $nhanVien->trangThai = 0;
        }
        return $nhanVien->update();
    }

    public static function capNhatLuong(Request $request)
    {
        $nhanVien = NhanVien::where('id', '=', $request->id)->first();
        if (isset($nhanVien)) {
            $soDienThoai = $request->soDienThoai;
            $soNgayLam = $request->soNgayLam;
            $tienLuongTheoNgay = $request->tienLuongTheoNgay;
            $tienLuongDaNhan = $request->tienLuongDaNhan;
            return $nhanVien->update(['soNgayLam' => $soNgayLam, 'tienLuongTheoNgay' => $tienLuongTheoNgay, 'tienLuongDaNhan' => $tienLuongDaNhan]);
        }
        return false;
    }

    public function myRandom()
    {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);
        return $string;
    }
}
