<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomSlugValidationMiddleware
{
    public function handle($request, Closure $next)
    {
        $customSlug = strtolower($request->input('custom_slug'));

        $palavrasProibidas = ['admin', 's2', 's1', 'cb', '3s', '2s', '1s', 'so', 'sub', 'subof', 'asp', '2t', '1t', 'cap', 'mj', 'tcel', 'cel', 'brig', 'mbrig', 'tbrig'];
        $oms = ['pals', 'afa', 'aspaer', 'baan', 'babv', 'bacg', 'baco', 'bafz', 'bant', 'bapv', 'barf', 'basc', 'basm', 'basp', 'baaf', 'cfiae', 'cgabeg', 'cae', 'cecafa', 'cca', 'ccabr', 'ccasj', 'ccarj', 'cecomsaer', 'cendoc', 'cgna', 'ciaer', 'clbi', 'cemal', 'cporaer', 'celog', 'cid', 'comdciber', 'comprep', 'comgep', 'comar', 'cabe', 'comara', 'cda', 'comfirem', 'ciscea', 'cojaer', 'dcta', 'destae', 'dasg', 'dts', 'dirap', 'direns', 'dirmab', 'dti', 'ecemaer', 'espe', 'esd', 'ebl', 'eda', 'eta', 'fays', 'gap', 'gapcea', 'gapbr', 'gapgw', 'gapmn', 'gapsj', 'gapdf', 'gaprj', 'gal', 'gsd', 'gsdaf', 'gac', 'gacpac', 'copac', 'gsdgl', 'geiv', 'hfa', 'haco', 'harf', 'hfab', 'hfag', 'iaop', 'icea', 'ifi', 'ipev', 'incaer', 'ita', 'jid', 'md', 'musal', 'oarf', 'oaci', 'pama', 'pamarf', 'pamagl', 'pambrj', 'pabe', 'pabr', 'paco', 'pafl', 'pagw', 'pant', 'papv', 'pasv', 'pasm', 'pasj', 'pagl', 'pr', 'gav', 'gcc', 'gt', 'gavca', 'gda', 'gtt', 'rbjid', 'secprom', 'fae', 'gt', 'gdaae', 'seripa', 'serep', 'srpv', 'sdab', 'cindacta', 'gdaae', 'vpr'];

        $listaPalavrasProibidas = array_merge($palavrasProibidas, $oms);

        if (in_array($customSlug, $listaPalavrasProibidas)) {
            return redirect()->back()->withInput()->withErrors(['custom_slug' => "Este fragmento não é permitido. '{$customSlug}'"]);
        }

        return $next($request);
    }
}
