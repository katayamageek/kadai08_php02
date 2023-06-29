<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

// 最後にクロスサイト対策用で関数を作りましょう
// hという名前の関数を作ります。
// 引数$strはなんでも好きな名前でよい

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}