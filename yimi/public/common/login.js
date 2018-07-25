var loginHtml = `<!-- Modal -->
    <div class="modal fade login" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          </div>
          <div class="modal-body">
            <ul class="login-tit" role="tablist"">
              <li class="active"  role="presentation">
            <a href="#login" aria-controls="home" role="tab" data-toggle="tab">
              登录
            </a>
                </li>
                <li  role="presentation">
                  <a href="#register" aria-controls="profile" role="tab" data-toggle="tab">
                    注册
                  </a>
                </li>
            </ul>
              <div class="tab-content login-box">
                  <!---登录-->
                <div role="tabpanel" class="tab-pane active" id="login">
                  <form action="" id="form1">
                      <label for="">
                        <p>用户名 <span class="red1">*</span></p>
                        <input type="text" placeholder="请输入用户名">
                      </label>
                      <label for="">
                        <p>密码 <span class="red1">*</span></p>
                        <input type="text" placeholder="请输入密码">
                      </label>
                      <label for="">
                        <div class="login-btn">登  录</div>
                      </label>
                    </form>
                  </div>
                  <!--注册-->
                  <div role="tabpanel" class="tab-pane" id="register">
                    <form action="" id="form2">
                      <label for="">
                        <p>用户名 <span class="red1">*</span></p>
                        <input type="text" placeholder="请输入用户名">
                      </label>
                      <label for="">
                        <p>邮箱 <span class="red1">*</span></p>
                        <input type="text" placeholder="请输入邮箱">
                      </label>
                      <label for="">
                        <p>密码 <span class="red1">*</span></p>
                        <input type="text" placeholder="请输入密码">
                      </label>
                      <label for="">
                        <p>确认密码 <span class="red1">*</span></p>
                        <input type="text" placeholder="请输入确认密码">
                      </label>
                      <label for="">
                        <div class="login-btn">注  册</div>
                      </label>
                    </form>
                  </div>
                  
              </div>
          </div>
        </div>
          
      </div>
    </div>
  <!--模态框 end -->`;


document.write(loginHtml);


