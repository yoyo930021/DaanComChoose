<?php
//Choose模型 選課資料表
class Choose extends Eloquent{
  //指定資料表
	protected $table='choose';
  //開啟自動維護時間欄位
	public $timestamps = true;
  //開放直接寫入的欄位
	protected $fillable = array('stu_id', 'choosed', 'wishresult','result');
}

