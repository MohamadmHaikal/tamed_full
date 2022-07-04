<template>
    <div class="login-area">
        <div class="row m-0">
            <div class="col-lg-6 col-md-12 p-0">
                <div class="login-image">
                    <img src="../../assets/images/login-bg.jpg" alt="image">
                </div>
            </div>

            <div class="col-lg-6 col-md-12 p-0">
                <div class="login-content">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="login-form">
                                <div class="logo">
                                    <router-link to="/">
                                        <img src="../../assets/images/black-logo.png" alt="image">
                                    </router-link>
                                </div>

                                <h3>Welcome back</h3>
                                <p>New to Vibion? <router-link to="/login">Log In</router-link></p>

                                <form>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" placeholder="Your Name" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" id="email" placeholder="Your email address" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" id="password" placeholder="Your password" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Login</button>
                                    
                                    <div class="forgot-password">
                                        <router-link to="/contact">
                                            Forgot Password?
                                        </router-link>
                                    </div>

                                    <div class="connect-with-social">
                                        <button type="submit" class="facebook"><i class="fab fa-facebook-square"></i> Connect with Facebook</button>
                                        <button type="submit" class="google"><i class="fab fa-google"></i> Connect with Google</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'RegisterForm'
    }
</script>