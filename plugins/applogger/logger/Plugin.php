<?php namespace AppLogger\Logger;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Logger',
            'description' => 'Systém na zaznamenávanie príchodov študentov',
            'author' => 'AppLogger',
            'icon' => 'icon-leaf'
        ];
    }
}

// Code review by Tobias [2025-04-30]:
// Request POST/logs zmeniť na tak, aby sa posielal len name a time ------------------------------- NOT DONE
// Zmeniť "return response()->json($logs);" na "return $logs;" ------------------------------------ done
// Z logs/{id} odstrániť tú vec na chcekovanie, či log existuje, lebo findOrFail to robí sama ----- done
// version.yaml má dve verzie, ale v prvej sa nič nedeje, takže ju treba zmazať ------------------- done
//
// Tipy:
// Namiesto request()->all() používať post() ------------------------------------------------------ done
// public $timestamps nemusí byť nastavený na true, lebo to je defaultné nastavenie --------------- done
// V plugin.php stačí mať funkciu pluignDetails(), ostatné sú zbytočné (nič nerobia) -------------- done