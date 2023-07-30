<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="<?=base_url('/assets/images/avatar.png')?>" alt="PlanOk">
						<div class="user-details">
							<div id="more-details"><?=$nombre?> <i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="<?= base_url('/') ?>" data-toggle="tooltip" title="Salir" class="text-danger">
									<i class="feather icon-power"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label><?=$titulo?></label>
					</li>
                <?php
                foreach ($itemsMenu as $item):
                    $menu = false;
                    if(isset($item['subitems'])) {
                        $menu = true;
                        $item['path'] = 'javascript:void(0)';
                        $subitems = implode("\n",array_map(function($subitems){return '<li><a href="'.base_url($subitems['path']).'">'.$subitems['titulo'].'</a></li>';},$item['subitems']));
                    }
                ?>
                    <li class="nav-item <?=$menu?'pcoded-hasmenu':''?>" id="<?=underscore($item['titulo']).md5($item['titulo'])?>">
						<a href="<?=base_url($item['path'])?>" class="nav-link "><span class="pcoded-micon"><i class="fas fa-<?=$item['icono']?>"></i></span><span class="pcoded-mtext"><?=$item['titulo']?></span></a>
                        <?php
                        if($menu):
                        ?>
						<ul class="pcoded-submenu">
							<?=$subitems?>
						</ul>
                        <?php
                        endif;
                        ?>
					</li>
                <?php
                endforeach;
                ?>
				</ul>
			</div>
		</div>
	</nav>