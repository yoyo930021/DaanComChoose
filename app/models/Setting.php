<?php
//Setting模型 設定
class Setting extends Eloquent{
  //指定資料表
	protected $table='settings';
  //關閉自動維護時間欄位
	public $timestamps = false;
}

