<?php 

$breadcrumbPaths = \App\Routes\Breadcrumb::get();

if ($breadcrumbPaths) {
?>
    <ul class="list-inline">
        <?php
        foreach ($breadcrumbPaths as $path) {
            echo '<li>';
            if (isset($path['url']) && ($url = $path['url'])) {
                echo '<a href="'. $url .'">'. $path['text'] .'</a>';
            } else {
                echo '<span>'. $path['text'] .'</span>';
            }
            echo '</li>';
        }
        ?>
    </ul>
<?php
}

