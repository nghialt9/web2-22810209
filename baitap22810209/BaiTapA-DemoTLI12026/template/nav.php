<!-- Navigation -->
<nav class="w3-bar w3-black">
    <a href="<?= htmlspecialchars($_projectUrl) ?>/indexa.php"
       class="w3-bar-item w3-button">My WebRoot</a>
    <a href="<?= htmlspecialchars($_pageUrl) ?>?page=home"
       class="w3-bar-item w3-button<?= $page === 'home' ? ' w3-grey' : '' ?>">Trang chủ</a>
    <a href="<?= htmlspecialchars($_pageUrl) ?>?page=magic"
       class="w3-bar-item w3-button<?= $page === 'magic' ? ' w3-grey' : '' ?>">Bảng ma thuật</a>
</nav>
