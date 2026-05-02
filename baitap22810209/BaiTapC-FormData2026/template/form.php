<div class="card shadow-sm h-100">
    <div class="card-header d-flex align-items-center gap-2">
        <i class="bi bi-calculator-fill text-warning"></i>
        <span class="fw-bold">Máy tính đơn giản</span>
    </div>
    <div class="card-body">
        <form method="post" action="<?= htmlspecialchars($_pageUrl) ?>?page=calc">
            <div class="mb-3">
                <label for="num1" class="form-label">Số thứ nhất</label>
                <input type="number" class="form-control" id="num1" name="num1" required>
            </div>
            <div class="mb-3">
                <label for="num2" class="form-label">Số thứ hai</label>
                <input type="number" class="form-control" id="num2" name="num2" required>
            </div>
            <div class="mb-3">
                <label for="operation" class="form-label">Phép tính</label>
                <select class="form-control" id="operation" name="operation" required>
                    <option value="+">Cộng</option>
                    <option value="-">Trừ</option>
                    <option value="*">Nhân</option>
                    <option value="/">Chia</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tính toán</button>
        </form>
    </div>
</div>