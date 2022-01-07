<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Login;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class LoginChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        sleep(1);

        $logins = [
            //past hour
             Login::whereBetween('created_at',[now()->subHours(3), now()->subHours(2)])->count(),
            //1 hr ago
            Login::whereBetween('created_at',[now()->subHours(2), now()->subHours(1)])->count(),
            //2 hours ago
            Login::whereBetween('created_at',[now()->subHours(1), now()])->count(),
        ];


        return Chartisan::build()
            ->labels(['Two Hours Ago', 'One Hour Ago', 'This Hour'])
            ->dataset('Logins', $logins);

    }
}
