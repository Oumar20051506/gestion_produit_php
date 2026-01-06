<?php
echo password_verify(
    '1234',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
) ? 'OK' : 'NON';