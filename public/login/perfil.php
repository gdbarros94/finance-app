<?php 
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --secondary-color: #3f37c9;
            --text-color: #2b2d42;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #6c757d;
            --success-color: #4bb543;
            --error-color: #ff3333;
            --border-radius: 8px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f7fa;
            color: var(--text-color);
            line-height: 1.6;
        }
        
        .content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--medium-gray);
        }
        
        .dashboard-header h1 {
            font-size: 1.8rem;
            font-weight: 500;
            color: var(--text-color);
        }
        
        .user-info {
            font-size: 0.9rem;
            color: var(--dark-gray);
        }
        
        .user-info strong {
            color: var(--primary-color);
            font-weight: 500;
        }
        
        .profile-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .profile-title {
            font-size: 1.5rem;
            font-weight: 500;
            color: var(--text-color);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-color);
            font-size: 0.9rem;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--medium-gray);
            border-radius: var(--border-radius);
            font-size: 0.95rem;
            transition: var(--transition);
            background-color: var(--light-gray);
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
            background-color: white;
        }
        
        .btn-save {
            background: var(--primary-color);
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-save:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.2);
        }
        
        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: var(--border-radius);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }
        
        .alert-success {
            background: rgba(75, 181, 67, 0.1);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }
        
        .alert-error {
            background: rgba(255, 51, 51, 0.1);
            color: var(--error-color);
            border-left: 4px solid var(--error-color);
        }
        
        .password-strength {
            margin-top: 0.5rem;
            height: 4px;
            background: var(--medium-gray);
            border-radius: 2px;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s ease;
        }
        
        .password-hint {
            font-size: 0.75rem;
            color: var(--dark-gray);
            margin-top: 0.25rem;
        }
        
        @media (max-width: 768px) {
            .content {
                padding: 1rem;
            }
            
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .user-info {
                margin-top: 0.5rem;
            }
            
            .profile-container {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="dashboard-header">
            <h1 class="profile-title">Perfil do Usuário</h1>
            <div class="user-info">
                <p>Bem-vindo, <strong><?php echo htmlspecialchars($user['nome']); ?></strong></p>
            </div>
        </div>
        
        <div class="profile-container">
            <?php if ($error): ?>
                <div class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 8px;">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 8px;">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($user['nome']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Endereço de e-mail</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="senha_atual">Senha atual <span style="color: var(--dark-gray); font-weight: normal;">(para confirmar alterações)</span></label>
                    <input type="password" id="senha_atual" name="senha_atual" required>
                </div>
                
                <div class="form-group">
                    <label for="nova_senha">Nova senha <span style="color: var(--dark-gray); font-weight: normal;">(deixe em branco para não alterar)</span></label>
                    <input type="password" id="nova_senha" name="nova_senha" oninput="checkPasswordStrength(this.value)">
                    <div class="password-strength">
                        <div class="password-strength-bar" id="password-strength-bar"></div>
                    </div>
                    <div class="password-hint">A senha deve conter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas e números.</div>
                </div>
                
                <div class="form-group">
                    <label for="confirma_senha">Confirme a nova senha</label>
                    <input type="password" id="confirma_senha" name="confirma_senha">
                </div>
                
                <button type="submit" class="btn-save">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-right: 8px;">
                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                    </svg>
                    Salvar alterações
                </button>
            </form>
        </div>
    </div>

    <script>
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('password-strength-bar');
            let strength = 0;
            
            // Verifica o comprimento da senha
            if (password.length >= 8) strength += 1;
            if (password.length >= 12) strength += 1;
            
            // Verifica se contém letras maiúsculas e minúsculas
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;
            
            // Verifica se contém números
            if (/\d/.test(password)) strength += 1;
            
            // Verifica se contém caracteres especiais
            if (/[^a-zA-Z0-9]/.test(password)) strength += 1;
            
            // Atualiza a barra de força
            switch(strength) {
                case 0:
                    strengthBar.style.width = '0%';
                    strengthBar.style.backgroundColor = 'transparent';
                    break;
                case 1:
                    strengthBar.style.width = '20%';
                    strengthBar.style.backgroundColor = '#ff3333';
                    break;
                case 2:
                    strengthBar.style.width = '40%';
                    strengthBar.style.backgroundColor = '#ff7b00';
                    break;
                case 3:
                    strengthBar.style.width = '60%';
                    strengthBar.style.backgroundColor = '#ffcc00';
                    break;
                case 4:
                    strengthBar.style.width = '80%';
                    strengthBar.style.backgroundColor = '#4bb543';
                    break;
                case 5:
                    strengthBar.style.width = '100%';
                    strengthBar.style.backgroundColor = '#4bb543';
                    break;
            }
        }
    </script>
</body>
</html>
