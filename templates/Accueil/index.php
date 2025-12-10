<div class="home-container">
    <div class="hero-section">
        <h1 class="main-title">Système de gestion des championnats</h1>
        
    </div>

    <div class="button-grid">
        <?php foreach ($links as $link): ?>
            <div class="button-item">
                <?= $this->Html->link(
                    $link['label'],
                    $link['url'],
                    ['class' => 'btn-home']
                ) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    * {
        box-sizing: border-box;
    }

    .home-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 60px 40px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    }

    .hero-section {
        text-align: center;
        margin-bottom: 60px;
        padding: 60px 40px;
        background: linear-gradient(to right, #1e3c72, #2a5298);
        border-radius: 4px;
        color: white;
    }

    .main-title {
        font-size: 2.8em;
        margin: 0 0 12px 0;
        font-weight: 600;
        letter-spacing: -0.5px;
    }

    .subtitle {
        font-size: 1.15em;
        margin: 0;
        opacity: 0.9;
        font-weight: 400;
    }

    .button-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }

    .button-item {
        position: relative;
    }

    .btn-home {
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        color: #2c3e50;
        padding: 32px 28px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 17px;
        font-weight: 500;
        transition: all 0.2s ease;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
        border: 1px solid #e1e8ed;
        height: 100%;
        min-height: 90px;
    }

    .btn-home:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        background: #fafbfc;
        border-color: #2a5298;
    }

    .btn-home:active {
        transform: translateY(0);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .home-container {
            padding: 40px 30px;
        }

        .button-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 16px;
        }
    }

    @media (max-width: 768px) {
        .home-container {
            padding: 30px 20px;
        }

        .hero-section {
            padding: 40px 24px;
        }

        .main-title {
            font-size: 2em;
        }

        .subtitle {
            font-size: 1em;
        }

        .button-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .btn-home {
            padding: 24px 20px;
            min-height: 70px;
            font-size: 16px;
        }
    }
</style>