<?php
//ClassAll模型 學程內容
class ClassAll extends Eloquent{
  //指定資料表
	protected $table='class';
  //關閉自動維護時間欄位
	public $timestamps = false;
}

