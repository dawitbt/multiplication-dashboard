<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Matrix - Advanced Multiplication Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="app-container">
        <header class="main-header">
            <div class="header-title">
                <h1>Dynamic Matrix</h1>
                <p>Advanced Multiplication Engine & Visualization Tool</p>
            </div>
            <button id="themeToggle" class="theme-btn" aria-label="Toggle Theme">
                <span class="icon-sun">☀️</span>
                <span class="icon-moon">🌙</span>
            </button>
        </header>

        <main class="dashboard-grid">
            <section class="card control-panel">
                <h2>Control Panel</h2>
                <form id="matrixForm" novalidate>
                    <div class="form-group">
                        <label for="numbers">Target Numbers (Comma separated)</label>
                        <input type="text" id="numbers" name="numbers" placeholder="e.g., 5, 7, 12" required>
                        <span class="error-msg" id="error-numbers"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="rangeStart">Start Range</label>
                            <input type="number" id="rangeStart" name="rangeStart" value="1" min="1" max="100" required>
                            <span class="error-msg" id="error-rangeStart"></span>
                        </div>
                        <div class="form-group">
                            <label for="rangeEnd">End Range</label>
                            <input type="number" id="rangeEnd" name="rangeEnd" value="10" min="1" max="100" required>
                            <span class="error-msg" id="error-rangeEnd"></span>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit" id="submitBtn">
                        <span class="btn-text">Generate Matrices</span>
                        <div class="spinner hidden"></div>
                    </button>
                </form>
            </section>

            <section class="card output-panel">
                <h2>Generated Workspace</h2>
                <div id="resultsWrapper" class="results-grid">
                    <div class="empty-state">
                        <p>Configure parameters and click generate to populate the matrix workspace.</p>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>
