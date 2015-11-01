<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent {

public function getCreatedAtAttribute($attr){

        $timestamp = strtotime($attr);
        $published = date('d.m.Y', $timestamp);

        if ($published === date('d.m.Y')) {
            return trans('date.today', ['time' => date('H:i', $timestamp)]);
        } elseif ($published === date('d.m.Y', strtotime('-1 day'))) {
            return trans('date.yesterday', ['time' => date('H:i', $timestamp)]);
        } else {
            $formatted = trans('date.later', [
                'time' => date('H:i', $timestamp),
                'date' => date('d F' . (date('Y', $timestamp) === date('Y') ? null : ' Y'), $timestamp)
            ]);
return strtr($formatted, trans('date.month_declensions'));
        }
}

public function getUpdatedAtAttribute($attr){

        $timestamp = strtotime($attr);
        $published = date('d.m.Y', $timestamp);

        if ($published === date('d.m.Y')) {
            return trans('date.today', ['time' => date('H:i', $timestamp)]);
        } elseif ($published === date('d.m.Y', strtotime('-1 day'))) {
            return trans('date.yesterday', ['time' => date('H:i', $timestamp)]);
        } else {
            $formatted = trans('date.later', [
                'time' => date('H:i', $timestamp),
                'date' => date('d F' . (date('Y', $timestamp) === date('Y') ? null : ' Y'), $timestamp)
            ]);
return strtr($formatted, trans('date.month_declensions'));
        }
}

}
