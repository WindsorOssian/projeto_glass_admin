<?php

// DIR informa aonde você está e quantos níveis você quer voltar
include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

$tituloPagina = 'Cadastro Disciplinas';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include_once PATH . 'Template/_includes/_head.php'; ?>

</head>

<body>

    <!-- Animated Background se tirar o fundo fica todo preto -->
    <?php include_once PATH . 'Template/_includes/_animacao_fundo.php'; ?>


    <div class="dashboard">
        <!-- Sidebar -->
        <?php include_once PATH . 'Template/_includes/_menu_adm.php'; ?>


        <main class="main-content">
            <!-- Main Content -->
            <?php include_once PATH . 'Template/_includes/_topo.php'; ?>

            <!-- Mobile Menu Toggle -->
            <?php include_once PATH . 'Template/_includes/_botao_menu.php'; ?>

            <!-- Formulário -->

            <div class="settings-grid">
                <!-- Settings Navigation -->
                <?php include_once PATH . 'Template/_includes/mini_menu_adm.php'; ?>

                <!-- Settings Content -->
                <div class="glass-card">
                    <!-- Profile Tab -->
                    <div class="settings-tab-content active" id="tab-profile">
                        <div class="profile-header">
                            <div class="profile-avatar-large">
                                ID
                                <div class="profile-avatar-edit">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="profile-info">
                                <h2>Disciplinas</h2>
                                <p>Aqui você pode cadastrar todas as suas disciplinas</p>
                            </div>
                        </div>

                        <form method="post" id="formCAD" action="cadastro_disciplinas.php">

                            <div class="settings-section">
                                <!-- <h3 class="settings-section-title">Profile Information</h3> -->
                                <div class="form-grid">
                                    <div class="form-group-settings">
                                        <label>Nome da disciplina</label>
                                        <input type="text" id="nome_disciplina" name="nome_disciplina" placeholder="Ex: Matemática...">
                                    </div>

                                    <!-- <div class="settings-row">
                                    <div class="settings-label">
                                    <span class="settings-label-title">Status da disciplina</span>
                                    <span class="settings-label-desc">Aqui você pode ativar ou inativar</span>
                                    </div>
                                    <select class="settings-select">
                                    <option value="1">Ativar</option>
                                    <option value="0">Inativar</option>
                                    </select>
                                    </div> -->

                                    <div class="settings-row">
                                        <div class="settings-label">
                                            <span class="settings-label-title">Status da disciplina</span>
                                            <span class="settings-label-desc">Aqui você pode ativar ou inativar</span>
                                        </div>

                                        <!-- <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span class="toggle-slider"></span>
                                    </label> -->

                                        <input type="hidden" name="status_disciplina" value="0">
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="status_disciplina" name="status_disciplina" value="1" checked>
                                            <span class="toggle-slider obg"></span>
                                        </label>

                                    </div>

                                    <div class="form-group-settings full-width">
                                        <label>Descrição</label>
                                        <textarea id="descricao_disciplina" name="descricao_disciplina" placeholder="Descreva a sua disciplina aqui..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" onclick="GravarDisciplina('formCAD')" id="btn_salvar" name="btn_salvar" class="btn btn-primary" style="width: auto;">Salvar</button>
                                <button name="btn_cancelar" class="btn btn-secondary" style="width: auto;">Cancel</button>
                            </div>
                        </form>
                    </div>

                    <!-- Security Tab -->
                    <!-- <div class="settings-tab-content" id="tab-security">
                        <div class="settings-section">
                            <h3 class="settings-section-title">Change Password</h3>
                            <div class="form-grid">
                                <div class="form-group-settings full-width">
                                    <label>Current Password</label>
                                    <input type="password" placeholder="Enter current password">
                                </div>
                                <div class="form-group-settings">
                                    <label>New Password</label>
                                    <input type="password" placeholder="Enter new password">
                                </div>
                                <div class="form-group-settings">
                                    <label>Confirm New Password</label>
                                    <input type="password" placeholder="Confirm new password">
                                </div>
                            </div>
                        </div>

                        <div class="settings-section">
                            <h3 class="settings-section-title">Two-Factor Authentication</h3>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Enable 2FA</span>
                                    <span class="settings-label-desc">Add an extra layer of security to your account</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">SMS Authentication</span>
                                    <span class="settings-label-desc">Receive codes via SMS</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Authenticator App</span>
                                    <span class="settings-label-desc">Use Google Authenticator or similar</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="settings-section">
                            <h3 class="settings-section-title">Active Sessions</h3>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Chrome on MacOS</span>
                                    <span class="settings-label-desc">San Francisco, CA • Current session</span>
                                </div>
                                <span class="status-badge completed">Active</span>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Safari on iPhone</span>
                                    <span class="settings-label-desc">San Francisco, CA • 2 hours ago</span>
                                </div>
                                <button class="card-btn" style="padding: 6px 12px;">Revoke</button>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Firefox on Windows</span>
                                    <span class="settings-label-desc">New York, NY • 3 days ago</span>
                                </div>
                                <button class="card-btn" style="padding: 6px 12px;">Revoke</button>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-primary" style="width: auto;">Update Password</button>
                            <button class="btn btn-secondary" style="width: auto;">Cancel</button>
                        </div>
                    </div> -->

                    <!-- Notifications Tab -->
                    <!-- <div class="settings-tab-content" id="tab-notifications">
                        <div class="settings-section">
                            <h3 class="settings-section-title">Email Notifications</h3>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Account Activity</span>
                                    <span class="settings-label-desc">Get notified about sign-ins and security changes</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">New Features</span>
                                    <span class="settings-label-desc">Learn about new features and updates</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Weekly Reports</span>
                                    <span class="settings-label-desc">Receive weekly analytics summary</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Marketing Emails</span>
                                    <span class="settings-label-desc">Receive news about promotions and offers</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="settings-section">
                            <h3 class="settings-section-title">Push Notifications</h3>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Desktop Notifications</span>
                                    <span class="settings-label-desc">Show notifications on your desktop</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Mobile Push</span>
                                    <span class="settings-label-desc">Receive push notifications on mobile</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Sound</span>
                                    <span class="settings-label-desc">Play sound for notifications</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-primary" style="width: auto;">Save Preferences</button>
                            <button class="btn btn-secondary" style="width: auto;">Reset to Default</button>
                        </div>
                    </div> -->

                    <!-- Appearance Tab -->
                    <!-- <div class="settings-tab-content" id="tab-appearance">
                        <div class="settings-section">
                            <h3 class="settings-section-title">Theme</h3>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Color Mode</span>
                                    <span class="settings-label-desc">Choose your preferred color mode</span>
                                </div>
                                <select class="settings-select" id="theme-select">
                                    <option value="dark">Dark Mode</option>
                                    <option value="light">Light Mode</option>
                                    <option value="system">System Default</option>
                                </select>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Accent Color</span>
                                    <span class="settings-label-desc">Choose your preferred accent color</span>
                                </div>
                                <select class="settings-select">
                                    <option>Emerald (Default)</option>
                                    <option>Blue</option>
                                    <option>Purple</option>
                                    <option>Orange</option>
                                    <option>Pink</option>
                                </select>
                            </div>
                        </div>

                        <div class="settings-section">
                            <h3 class="settings-section-title">Display</h3>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Compact Mode</span>
                                    <span class="settings-label-desc">Reduce spacing for more content</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Animations</span>
                                    <span class="settings-label-desc">Enable smooth animations and transitions</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Blur Effects</span>
                                    <span class="settings-label-desc">Enable glassmorphism blur effects</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            <div class="settings-row">
                                <div class="settings-label">
                                    <span class="settings-label-title">Floating Orbs</span>
                                    <span class="settings-label-desc">Show animated background orbs</span>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button class="btn btn-primary" style="width: auto;">Apply Changes</button>
                            <button class="btn btn-secondary" style="width: auto;">Reset to Default</button>
                        </div>
                    </div> -->

                    <!-- Billing Tab -->
                    <!-- <div class="settings-tab-content" id="tab-billing">
                        <div class="settings-section">
                            <h3 class="settings-section-title">Current Plan</h3>
                            <div class="billing-plan-card" style="background: linear-gradient(135deg, rgba(5, 150, 105, 0.15), rgba(212, 165, 116, 0.15)); padding: 24px; border-radius: 16px; margin-bottom: 20px; border: 1px solid var(--glass-border);">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                                    <div>
                                        <h4 style="font-size: 20px; font-weight: 600; margin-bottom: 4px;">Pro Plan</h4>
                                        <p style="color: var(--text-muted); font-size: 14px;">Billed monthly</p>
                                    </div>
                                    <div style="text-align: right;">
                                        <span style="font-family: 'Space Mono', monospace; font-size: 32px; font-weight: 700;">$29</span>
                                        <span style="color: var(--text-muted);">/month</span>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 12px;">
                                    <button class="btn btn-primary" style="width: auto; padding: 10px 20px;">Upgrade Plan</button>
                                    <button class="btn btn-secondary" style="width: auto; padding: 10px 20px;">Cancel Subscription</button>
                                </div>
                            </div>
                        </div>

                        <div class="settings-section">
                            <h3 class="settings-section-title">Payment Method</h3>
                            <div class="settings-row">
                                <div class="settings-label" style="display: flex; align-items: center; gap: 16px;">
                                    <div style="width: 48px; height: 32px; background: linear-gradient(135deg, #1a1f71, #00579f); border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                                        <span style="color: white; font-size: 10px; font-weight: bold;">VISA</span>
                                    </div>
                                    <div>
                                        <span class="settings-label-title">Visa ending in 4242</span>
                                        <span class="settings-label-desc">Expires 12/2026</span>
                                    </div>
                                </div>
                                <button class="card-btn" style="padding: 6px 12px;">Edit</button>
                            </div>
                            <div style="margin-top: 16px;">
                                <button class="btn btn-secondary" style="width: auto; padding: 10px 20px;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Add Payment Method
                                </button>
                            </div>
                        </div>

                        <div class="settings-section">
                            <h3 class="settings-section-title">Billing History</h3>
                            <div class="table-wrapper" style="margin: 0;">
                                <table class="data-table" style="min-width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Jan 1, 2025</td>
                                            <td>Pro Plan - Monthly</td>
                                            <td><span class="table-amount">$29.00</span></td>
                                            <td><span class="status-badge completed">Paid</span></td>
                                            <td><a href="#" style="color: var(--emerald-light);">Download</a></td>
                                        </tr>
                                        <tr>
                                            <td>Dec 1, 2024</td>
                                            <td>Pro Plan - Monthly</td>
                                            <td><span class="table-amount">$29.00</span></td>
                                            <td><span class="status-badge completed">Paid</span></td>
                                            <td><a href="#" style="color: var(--emerald-light);">Download</a></td>
                                        </tr>
                                        <tr>
                                            <td>Nov 1, 2024</td>
                                            <td>Pro Plan - Monthly</td>
                                            <td><span class="table-amount">$29.00</span></td>
                                            <td><span class="status-badge completed">Paid</span></td>
                                            <td><a href="#" style="color: var(--emerald-light);">Download</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

        </main>
    </div>


    <!-- Footer -->
    <?php include_once PATH . 'Template/_includes/_footer.php'; ?>
    <!-- Scripts -->
    <?php include_once PATH . 'Template/_includes/_scripts.php'; ?>

    <script src="../../Resource/ajax/disciplina_ajax.js"></script>
    <!-- TemplateMo 607 Glass Admin -->
</body>

</html>