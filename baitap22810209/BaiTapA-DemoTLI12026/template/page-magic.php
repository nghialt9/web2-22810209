  <!-- Bảng ma thuật -->
  <div class="w3-card-4 w3-margin w3-white">
    <div class="w3-container">
      <h3 id="magic-table"><b>BẢNG MA THUẬT 8×8</b></h3>
      <h5>Thời điểm tạo bảng: <span class="w3-opacity"><?= $serverTime ?></span></h5>
    </div>

    <div class="w3-container">
      <p>
        Các số tô <span style="background:#f44336;color:#fff;padding:2px 6px">đỏ</span>
        trùng với:
        <b>ngày (<?= $t['d'] ?>)</b>,
        <b>tháng (<?= $t['m'] ?>)</b>,
        <b>giờ (<?= $t['H'] ?>)</b>,
        <b>phút (<?= $t['i'] ?>)</b>,
        <b>giây (<?= $t['s'] ?>)</b>.
        <?php if ($highlight): ?>
        → Các số cần tô: <b><?= implode(', ', $highlight) ?></b>. <!-- implode nối các phần tử của mảng thành chuỗi, ngăn cách bằng dấu phẩy -->
        <?php else: ?>
        → Không có số nào trong 1–60 trùng với thời điểm hiện tại.
        <?php endif; ?>
      </p>

      <table class="magic-table">
        <?php for ($i = 0; $i < 8; $i++): ?>
        <tr>
          <?php for ($j = 0; $j < 8; $j++):
            $val = $cells[$i * 8 + $j] ?? null; // Lấy giá trị của ô, nếu không tồn tại thì là null
            $cls = $val === null ? 'empty' : (in_array($val, $highlight) ? 'hl' : ''); // Nếu ô có giá trị và nằm trong highlight thì thêm class 'hl'
          ?>
          <td class="<?= $cls ?>"><?= $val ?? '' ?></td><!-- Hiển thị giá trị của ô, nếu null thì hiển thị chuỗi rỗng -->
          <?php endfor; ?>
        </tr>
        <?php endfor; ?>
      </table>

      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border"
              onclick="location.href='<?= htmlspecialchars($_pageUrl) ?>?page=magic&_=<?= time() ?>#magic-table'">
              <b>↺ TẠO BẢNG MỚI »</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Ô đỏ </b>
            <span class="w3-tag" style="background:#f44336">
              <?= count(array_filter($cells, fn($v) => $v !== null && in_array($v, $highlight))) ?>
            </span>
          </span></p>
        </div>
      </div>
    </div>
  </div>
