<?php

function timestamp(): string
{
    return date('Y-m-d H:i:s');
}

// Get last argument which should always be the target URL
$target = $argv[$argc - 1];

// Remove https:// and http:// then convert / to .
$dirname = str_replace(['https://', 'https://', '/'], ['', '', '.'], $target);

// Trim out trailing dot which can not be valid file name
$dirname = trim($dirname, '.');

// Create the directory to store the wget output
shell_exec("mkdir /tmp/$dirname");

// Escape the target to prevent injecting the wget call (paranoid?)
$escTarget = escapeshellarg($target);

// Run wget in tmp directory
shell_exec("cd /tmp/$dirname ; wget --recursive --html-extension --convert-links --restrict-file-names=windows --no-directories --no-parent --level=1 --span-hosts --tries=2 --timeout=5 $escTarget");

// Save a timestamp into the a hidden file
file_put_contents("/tmp/$dirname/.timestamp", timestamp());

if (in_array('--zip', $argv)) {
    shell_exec("7z a -mx9 /tmp/$dirname.7z /tmp/$dirname");
    shell_exec("mv -f /tmp/$dirname.7z /data");
} else {
    shell_exec("mv -f /tmp/$dirname /data");
}

// Define bash color escape sequences
$green = "\e[1;32m";
$yellow = "\e[0;33m";

// Print out status bar
echo "{$green}🍺🍺\n";
echo "{$green}🍺🍺 Chug complete: {$yellow}$target\n";
echo "{$green}🍺🍺\n";