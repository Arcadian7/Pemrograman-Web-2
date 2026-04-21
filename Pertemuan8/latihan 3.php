<?php
function repeat($text, $num = 10) {
    echo "<ol>";
    for ($i = 0; $i < $num; $i++) {
        echo "<li>" . htmlspecialchars($text) . "</li>";
    }
    echo "</ol>";
}

// Memanggil function dengan dua argumen
repeat("I'm the best", 15);

// Memanggil function dengan satu argumen (pakai default 10)
repeat("You're the man");
?>