<?php
session_start();

define('DATA_FILE', __DIR__ . '/data/users.json');

function h(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function get_users(): array {
    if (!file_exists(DATA_FILE)) {
        if (!is_dir(dirname(DATA_FILE))) {
            mkdir(dirname(DATA_FILE), 0775, true);
        }
        file_put_contents(DATA_FILE, json_encode([], JSON_PRETTY_PRINT));
    }
    $content = file_get_contents(DATA_FILE);
    $users = json_decode($content ?: '[]', true);
    return is_array($users) ? $users : [];
}

function save_users(array $users): void {
    if (!is_dir(dirname(DATA_FILE))) {
        mkdir(dirname(DATA_FILE), 0775, true);
    }
    file_put_contents(DATA_FILE, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
}

function current_user(): ?array {
    return $_SESSION['user'] ?? null;
}
