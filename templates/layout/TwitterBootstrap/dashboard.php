<?php
/**
 * @var \Cake\View\View $this
 */
use Cake\Core\Configure;

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend(
    'tb_body_attrs',
    ' class="' .
        implode(' ', [h($this->request->getParam('controller')), h($this->request->getParam('action'))]) .
        '" '
);
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <?= $this->Html->link(
            Configure::read('App.title', 'Blog_app'),
            '/',
            ['class' => 'navbar-brand col-md-3 col-lg-1 me-0 px-3']
        ) ?>
        <button
            class="navbar-toggler position-absolute d-md-none collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
       
	  <nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
		</nav>
			   
        <ul class="navbar-nav px-3">			
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            
			
  

            <main role="main" class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center
                            pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 page-header"><?= h($this->request->getParam('controller')) ?></h1>
                </div>
<?php
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash)) {
        echo $this->Flash->render();
    }
    $this->end();
}
$this->end();

$this->start('tb_body_end');
?>
            </main>
        </div>
    </div>
</body>
<?php
$this->end();

echo $this->fetch('content');
