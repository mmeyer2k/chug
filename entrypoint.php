<?php

function timestamp(): string
{
    return date('Y-m-d H:i:s');
}

// Get last argument which should always be the target URL
$target = $argv[$argc - 1];

$dirname = str_replace(['https://', 'https://', '/'], ['', '', '.'], $target);

shell_exec("mkdir /tmp/$dirname");

shell_exec("cd /tmp/$dirname ; wget --recursive --html-extension --convert-links --restrict-file-names=windows --no-directories --no-parent --level=1 --span-hosts --tries=5 --timeout=5 $target");

file_put_contents("/tmp/$dirname/.timestamp", timestamp());

if (in_array('--zip', $argv)) {
    shell_exec("7z a -mx9 /tmp/$dirname.7z /tmp/$dirname");
    shell_exec("mv -f /tmp/$dirname.7z /data");
} else {
    shell_exec("mv -f /tmp/$dirname /data");
}

$green = "\e[0;32m";
$yellow = "\e[1;33m";

echo "{$green}Done chugging: {$yellow}$target\n";