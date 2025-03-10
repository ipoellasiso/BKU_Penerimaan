<?php
function formatRupiah1($nominal)
{
    return "Rp" . number_format($nominal, 0,',', '.');
}