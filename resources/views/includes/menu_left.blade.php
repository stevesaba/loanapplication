<div class="sidebar sidebar-style-2">     
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-primary">
            <li class="nav-item bdr_top1">
              <a href="<?php echo url('/customerDashboard'); ?>">
                <i class="las la-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item active">
              <a data-toggle="collapse" href="#Vendor">
                <i class="las la-dolly-flatbed"></i>
                <p>Loan Application</p>
                <span class="caret"></span>
              </a>
              <div class="collapse show" id="Vendor">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="<?php echo url('/customerNewApplication'); ?>">
                      <span class="sub-item">Apply New Application</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo url('/customerAppliedLoan'); ?>">
                      <span class="sub-item">Applied Application</span>
                    </a>
                  </li>
                  
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
							<a data-toggle="collapse" href="#Management">
								<i class="las la-cog"></i>
								<p>Setting</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="Management">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo url('customerLogout'); ?>">
											<span class="sub-item">Logout</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
            
          </ul>
        </div>
      </div>
    </div>