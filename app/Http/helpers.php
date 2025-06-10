<?php

use Carbon\Carbon;

function formatDate($date) {
    return Carbon::parse($date)->format('d/m/Y');
}