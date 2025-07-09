<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Login Page -->
    <div id="loginPage" class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo">💪</div>
                <h1>Trainer Dashboard</h1>
                <p>Sign in to manage your training sessions</p>
            </div>
            <form id="loginForm" class="login-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div id="loginError" class="error-message" style="display: none;"></div>
                <button type="submit" class="login-btn">
                    <span id="loginBtnText">Sign In</span>
                    <div id="loginSpinner" class="spinner" style="display: none;"></div>
                </button>
            </form>
            <div class="demo-credentials">
                <p><strong>Demo Credentials:</strong></p>
                <p>Username: johnsmith | Password: password123</p>
                <p>Username: sarahj | Password: trainer456</p>
                <p>Username: mikew | Password: fitness789</p>
            </div>
            <!-- Admin Login Link -->
            <div class="admin-login-link">
                <p>Are you an administrator?</p>
                <a href="#" id="adminLoginLink" class="admin-link">Admin Login</a>
            </div>
        </div>
    </div>

    <!-- Dashboard -->
    <div id="dashboard" class="dashboard" style="display: none;">
        <!-- Header -->
        <header class="header">
            <div class="header-left">
                <h1>🗓️ Trainer Dashboard</h1>
            </div>
            <div class="header-right">
                <button id="createSessionBtn" class="create-btn">
                    ➕ Create Session
                </button>
                <button id="upcomingSessionsBtn" class="create-btn" style="background: #48bb78;">
                    📅 Upcoming Sessions
                </button>
                <div class="user-info">
                    <span id="trainerName"></span>
                    <button id="logoutBtn" class="logout-btn">Logout</button>
                </div>
            </div>
        </header>

        <div class="main-content">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="view-controls">
                    <h3>Calendar Views</h3>
                    <button class="view-btn active" data-view="month">📅 Monthly View</button>
                    <button class="view-btn" data-view="week">📊 Weekly View</button>
                    <button class="view-btn" data-view="day">📋 Daily View</button>
                </div>
                <div class="stats">
                    <h3>Quick Stats</h3>
                    <div class="stat-card">
                        <div class="stat-number" id="totalSessions">0</div>
                        <div class="stat-label">Total Sessions</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number" id="upcomingSessions">0</div>
                        <div class="stat-label">Upcoming</div>
                    </div>
                </div>
            </aside>

            <!-- Calendar Content -->
            <main class="calendar-content">
                <div class="calendar-header">
                    <div class="calendar-nav">
                        <button id="prevBtn" class="nav-btn">‹</button>
                        <h2 id="currentDate"></h2>
                        <button id="nextBtn" class="nav-btn">›</button>
                    </div>
                    <div class="view-tabs">
                        <button class="tab-btn active" data-view="month">Month</button>
                        <button class="tab-btn" data-view="week">Week</button>
                        <button class="tab-btn" data-view="day">Day</button>
                    </div>
                </div>
                <div id="calendarView" class="calendar-view"></div>
            </main>
        </div>
    </div>

    <!-- Create Session Modal -->
    <div id="createSessionModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create Training Sessions</h2>
                <button id="closeModal" class="close-btn">&times;</button>
            </div>
            <form id="createSessionForm" class="session-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="sessionTitle">Session Title *</label>
                        <input type="text" id="sessionTitle" name="title" placeholder="e.g., Personal Training - John Doe" required>
                    </div>
                    <div class="form-group">
                        <label for="clientName">Client Name *</label>
                        <input type="text" id="clientName" name="client" placeholder="Client name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sessionType">Session Type *</label>
                    <select id="sessionType" name="type" required>
                        <option value="">Select type</option>
                        <option value="Personal Training">Personal Training</option>
                        <option value="Group Class">Group Class</option>
                        <option value="Yoga">Yoga</option>
                        <option value="Pilates">Pilates</option>
                        <option value="Cardio">Cardio</option>
                        <option value="Strength Training">Strength Training</option>
                        <option value="Consultation">Consultation</option>
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="startDate">Start Date *</label>
                        <input type="date" id="startDate" name="startDate" required>
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date *</label>
                        <input type="date" id="endDate" name="endDate" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="startTime">Start Time *</label>
                        <input type="time" id="startTime" name="startTime" required>
                    </div>
                    <div class="form-group">
                        <label for="endTime">End Time *</label>
                        <input type="time" id="endTime" name="endTime" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Select Days *</label>
                    <div class="weekdays">
                        <label class="weekday-label">
                            <input type="checkbox" name="weekdays" value="1"> Monday
                        </label>
                        <label class="weekday-label">
                            <input type="checkbox" name="weekdays" value="2"> Tuesday
                        </label>
                        <label class="weekday-label">
                            <input type="checkbox" name="weekdays" value="3"> Wednesday
                        </label>
                        <label class="weekday-label">
                            <input type="checkbox" name="weekdays" value="4"> Thursday
                        </label>
                        <label class="weekday-label">
                            <input type="checkbox" name="weekdays" value="5"> Friday
                        </label>
                        <label class="weekday-label">
                            <input type="checkbox" name="weekdays" value="6"> Saturday
                        </label>
                        <label class="weekday-label">
                            <input type="checkbox" name="weekdays" value="0"> Sunday
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description (Optional)</label>
                    <textarea id="description" name="description" rows="3" placeholder="Additional notes about the session..."></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" id="cancelBtn" class="cancel-btn">Cancel</button>
                    <button type="submit" class="submit-btn">
                        <span id="submitBtnText">Create Sessions</span>
                        <div id="submitSpinner" class="spinner" style="display: none;"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Upcoming Sessions Modal -->
    <div id="upcomingSessionsModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h2>📅 Upcoming Sessions</h2>
                <button id="closeUpcomingModal" class="close-btn">&times;</button>
            </div>
            <div id="upcomingSessionsList" class="upcoming-sessions-list">
                <!-- Sessions will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Initialize dashboard when page loads
        let dashboard;
        document.addEventListener('DOMContentLoaded', function() {
            dashboard = new TrainerDashboard();
            
            // Add admin login link functionality
            document.getElementById('adminLoginLink').addEventListener('click', function(e) {
                e.preventDefault();
                // Hide trainer login and show admin login
                document.getElementById('loginPage').style.display = 'none';
                showAdminLoginPage();
            });

            // Function to show admin login page
            function showAdminLoginPage() {
                // Create admin login page if it doesn't exist
                let adminLoginPage = document.getElementById('adminLoginPage');
                if (!adminLoginPage) {
                    createAdminLoginPage();
                } else {
                    adminLoginPage.style.display = 'flex';
                }
            }

            // Function to create admin login page
            function createAdminLoginPage() {
                const adminLoginHTML = `
                    <div id="adminLoginPage" class="login-container">
                        <div class="login-card">
                            <div class="login-header">
                                <div class="logo">👨‍💼</div>
                                <h1>Admin Dashboard</h1>
                                <p>Sign in to manage trainers and sessions</p>
                            </div>
                            <form id="adminLoginForm" class="login-form">
                                <div class="form-group">
                                    <label for="adminUsername">Username</label>
                                    <input type="text" id="adminUsername" name="username" placeholder="Enter admin username" required>
                                </div>
                                <div class="form-group">
                                    <label for="adminPassword">Password</label>
                                    <input type="password" id="adminPassword" name="password" placeholder="Enter admin password" required>
                                </div>
                                <div id="adminLoginError" class="error-message" style="display: none;"></div>
                                <button type="submit" class="login-btn">
                                    <span id="adminLoginBtnText">Sign In</span>
                                    <div id="adminLoginSpinner" class="spinner" style="display: none;"></div>
                                </button>
                            </form>
                            <div class="demo-credentials">
                                <p><strong>Admin Credentials:</strong></p>
                                <p>Username: admin | Password: admin123</p>
                                <p>Username: superadmin | Password: super123</p>
                            </div>
                            <!-- Back to Trainer Login Link -->
                            <div class="admin-login-link">
                                <p>Are you a trainer?</p>
                                <a href="#" id="backToTrainerLink" class="admin-link">Back to Trainer Login</a>
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.insertAdjacentHTML('beforeend', adminLoginHTML);
                
                // Bind admin login events
                bindAdminLoginEvents();
            }

            // Function to bind admin login events
            function bindAdminLoginEvents() {
                // Admin login form submission
                document.getElementById('adminLoginForm').addEventListener('submit', handleAdminLogin);
                
                // Back to trainer login link
                document.getElementById('backToTrainerLink').addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('adminLoginPage').style.display = 'none';
                    document.getElementById('loginPage').style.display = 'flex';
                });
            }

            // Function to handle admin login
            async function handleAdminLogin(e) {
                e.preventDefault();
                
                const username = document.getElementById('adminUsername').value.trim();
                const password = document.getElementById('adminPassword').value.trim();
                const errorDiv = document.getElementById('adminLoginError');
                const btnText = document.getElementById('adminLoginBtnText');
                const spinner = document.getElementById('adminLoginSpinner');
                
                // Validation
                if (!username || !password) {
                    errorDiv.textContent = 'Please enter both username and password';
                    errorDiv.style.display = 'block';
                    return;
                }
                
                // Reset UI
                btnText.style.display = 'none';
                spinner.style.display = 'block';
                errorDiv.style.display = 'none';
                
                try {
                    const response = await fetch('api/admin-login.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            username: username,
                            password: password
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (data.success && data.admin) {
                        // Store admin data and redirect to admin dashboard
                        localStorage.setItem('admin', JSON.stringify(data.admin));
                        window.location.href = 'admin.php';
                    } else {
                        const errorMessage = data.error || 'Login failed. Please try again.';
                        errorDiv.textContent = errorMessage;
                        errorDiv.style.display = 'block';
                    }
                } catch (error) {
                    console.error('Admin login error:', error);
                    errorDiv.textContent = 'Connection error. Please check if the server is running and try again.';
                    errorDiv.style.display = 'block';
                }
                
                // Reset button state
                btnText.style.display = 'block';
                spinner.style.display = 'none';
            }
        });
    </script>
    <script src="script.js"></script>
</body>
</html>
