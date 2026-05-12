<?php
require_once __DIR__ . "/Model/Todolist.php";
require_once __DIR__ . "/BusinessLogic/ShowTodolist.php";
require_once __DIR__ . "/BusinessLogic/AddTodolist.php";
require_once __DIR__ . "/BusinessLogic/RemoveTodolist.php";
require_once __DIR__ . "/BusinessLogic/CompleteTodolist.php";

// Handle Actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'add' && !empty(trim($_POST['todo']))) {
            addTodolist(trim($_POST['todo']));
        } elseif ($_POST['action'] === 'remove' && isset($_POST['id'])) {
            removeTodolist((int)$_POST['id']);
        } elseif ($_POST['action'] === 'complete' && isset($_POST['id'])) {
            completeTodolist((int)$_POST['id']);
        } elseif ($_POST['action'] === 'clear_completed') {
            $_SESSION['completed_todolist'] = [];
        }
    }
    // Redirect to prevent form resubmission
    header("Location: index.php" . (isset($_GET['tab']) ? "?tab=" . $_GET['tab'] : ""));
    exit;
}

$active_tab = $_GET['tab'] ?? 'todo';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Todolist Premium</title>
    <style>
        :root {
            --bg-color: #0f172a;
            --card-bg: #1e293b;
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --accent: #38bdf8;
            --accent-hover: #0ea5e9;
            --danger: #ef4444;
            --success: #22c55e;
            --border: #334155;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-primary);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: var(--card-bg);
            padding: 32px;
            border-radius: 16px;
            border: 1px solid var(--border);
        }

        h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 24px;
            text-align: center;
            letter-spacing: -0.025em;
        }

        .tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 24px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 8px;
        }

        .tab {
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .tab.active {
            background-color: var(--border);
            color: var(--text-primary);
        }

        .tab:hover:not(.active) {
            color: var(--text-primary);
        }

        form.add-form {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
        }

        input[type="text"] {
            flex: 1;
            background-color: var(--bg-color);
            border: 1px solid var(--border);
            color: var(--text-primary);
            padding: 12px 16px;
            border-radius: 10px;
            outline: none;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus {
            border-color: var(--accent);
        }

        button.btn-add {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        button.btn-add:hover {
            background-color: var(--accent-hover);
        }

        .todo-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .todo-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid var(--border);
            animation: fadeIn 0.3s ease;
        }

        .todo-item:last-child {
            border-bottom: none;
        }

        .todo-text {
            flex: 1;
            font-size: 15px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            background: none;
            border: none;
            padding: 6px;
            cursor: pointer;
            color: var(--text-secondary);
            transition: color 0.2s;
            font-size: 13px;
            font-weight: 500;
        }

        .btn-complete:hover { color: var(--success); }
        .btn-remove:hover { color: var(--danger); }

        .empty-state {
            text-align: center;
            color: var(--text-secondary);
            padding: 40px 0;
            font-size: 14px;
        }

        .completed-text {
            text-decoration: line-through;
            color: var(--text-secondary);
        }

        .btn-clear {
            display: block;
            width: 100%;
            margin-top: 24px;
            padding: 12px;
            background: transparent;
            border: 1px solid var(--danger);
            color: var(--danger);
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-clear:hover {
            background-color: var(--danger);
            color: white;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Todolist PHP</h1>

        <div class="tabs">
            <a href="?tab=todo" class="tab <?= $active_tab === 'todo' ? 'active' : '' ?>">Daftar Tugas</a>
            <a href="?tab=completed" class="tab <?= $active_tab === 'completed' ? 'active' : '' ?>">Tugas Selesai</a>
        </div>

        <?php if ($active_tab === 'todo'): ?>
            <form action="index.php?tab=todo" method="POST" class="add-form">
                <input type="hidden" name="action" value="add">
                <input type="text" name="todo" placeholder="Tambah tugas baru..." required autocomplete="off">
                <button type="submit" class="btn-add">Tambah</button>
            </form>

            <ul class="todo-list">
                <?php if (empty($_SESSION['todolist'])): ?>
                    <div class="empty-state">Tidak ada tugas. Santai dulu!</div>
                <?php else: ?>
                    <?php foreach ($_SESSION['todolist'] as $id => $todo): ?>
                        <li class="todo-item">
                            <span class="todo-text"><?= htmlspecialchars($todo) ?></span>
                            <div class="actions">
                                <form action="index.php?tab=todo" method="POST" style="display:inline;">
                                    <input type="hidden" name="action" value="complete">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <button type="submit" class="btn-action btn-complete">Selesai</button>
                                </form>
                                <form action="index.php?tab=todo" method="POST" style="display:inline;">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <button type="submit" class="btn-action btn-remove">Hapus</button>
                                </form>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        <?php else: ?>
            <ul class="todo-list">
                <?php if (empty($_SESSION['completed_todolist'])): ?>
                    <div class="empty-state">Belum ada tugas yang diselesaikan.</div>
                <?php else: ?>
                    <?php foreach ($_SESSION['completed_todolist'] as $todo): ?>
                        <li class="todo-item">
                            <span class="todo-text completed-text"><?= htmlspecialchars($todo) ?></span>
                        </li>
                    <?php endforeach; ?>
                    
                    <form action="index.php?tab=completed" method="POST">
                        <input type="hidden" name="action" value="clear_completed">
                        <button type="submit" class="btn-clear">Bersihkan Riwayat</button>
                    </form>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </div>

</body>
</html>
