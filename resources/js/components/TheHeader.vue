<template>
  <header class="header-style-3">
    <!-- Start Desktop Menu -->
    <div class="menubox">
      <div class="container-fluid">
        <div class="row d-lg-none d-block">
          <div class="mobile-menu">
            <div class="mobile-menu__menu-top border-bottom-0">
              <div class="container">
                <div class="row">
                  <div
                    class="menu-info d-flex justify-content-between align-items-center"
                  >
                    <div class="menubar">
                      <span></span> <span></span>
                      <span></span>
                    </div>
                    <a href="index.html" class="logo">
                      <img src="assets/images/logo/logo.png" alt="" />
                    </a>
                    <div class="cart-holder">
                      <a href="#0" class="cart cart-icon position-relative">
                        <i class="flaticon-shopping-cart"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="menu-closer"></div>
            <div class="mobile-menu__sidebar-menu">
              <div class="menu-closer two">
                <span> Close Menu</span>
                <span class="cross"><i class="flaticon-cross"></i></span>
              </div>
              <div class="search-box-holder">
                <form action="#0">
                  <div class="form-group search-box menu">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Search for products"
                    />
                    <span class="search-icon">
                      <i class="flaticon-magnifying-glass"></i
                    ></span>
                  </div>
                </form>
              </div>
              <nav>
                <ul
                  class="page-dropdown-menu d-flex align-items-center justify-content-center"
                >
                  <li class="dropdown-list">
                    <router-link to="/"><span>Home</span> </router-link>
                  </li>
                  <li class="dropdown-list">
                    <router-link to="/products"
                      ><span>Продукты</span>
                    </router-link>
                  </li>
                </ul>
              </nav>
              <div class="right d-flex align-items-center justify-content-end">
                <ul class="main-menu__widge-box d-flex align-items-center">
                  <li class="d-lg-block d-none">
                    <a href="my-account.html"><i class="flaticon-user"></i> </a>
                  </li>
                  <li class="d-lg-block d-none">
                    <a href="wishlist.html" class="number"
                      ><i class="flaticon-heart"></i>
                      <span class="count">(2)</span>
                    </a>
                  </li>
                  <li class="cartm">
                    <a href="#0" class="number cart-icon">
                      <i class="flaticon-shopping-cart"></i
                      ><span class="count">(555)</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="d-lg-block d-none">
          <div class="row g-0 position-relative">
            <div
              class="col-lg-3 d-flex align-items-center justify-content-center border-rit"
            >
              <div class="logo">
                <a href="index.html">
                  <img src="assets/images/logo/logo.png" alt="" />
                </a>
              </div>
            </div>
            <div class="col-lg-9 g-0 p-0">
              <div class="row g-0 holder">
                <div class="col-12">
                  <div class="some-info">
                    <p class="d-flex align-items-center">
                      <span class="icon">
                        <i class="flaticon-power"></i>
                      </span>
                      Welcome to Karte Online Shop
                    </p>
                    <div class="right d-flex align-items-center">
                      <div class="language currency">
                        <select>
                          <option>USD</option>
                          <option value="1">INR</option>
                          <option value="2">BDT</option>
                        </select>
                      </div>
                      <div class="language two">
                        <select>
                          <option>ENGLISH</option>
                          <option value="1">GERMAN</option>
                          <option value="4">FRENCH</option>
                        </select>
                      </div>
                      <a href="login.html"> Sign In / Register </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-one"></div>
              <div class="row g-0 holder">
                <div class="col-12">
                  <div class="mega-menu-default mega-menu d-lg-block d-none">
                    <div
                      class="d-flex align-items-center justify-content-between"
                    >
                      <nav>
                        <ul
                          class="page-dropdown-menu d-flex align-items-center justify-content-center"
                        >
                          <li class="dropdown-list">
                            <router-link to="/"><span>Home</span> </router-link>
                          </li>
                          <li class="dropdown-list">
                            <router-link to="/products"
                              ><span>Продукты</span>
                            </router-link>
                          </li>
                        </ul>
                      </nav>
                      <div
                        class="right d-flex align-items-center justify-content-end"
                      >
                        <ul
                          class="main-menu__widge-box d-flex align-items-center"
                        >
                          <li class="d-lg-block d-none">
                            <a href="my-account.html"
                              ><i class="flaticon-user"></i>
                            </a>
                          </li>
                          <li class="d-lg-block d-none">
                            <a href="wishlist.html" class="number"
                              ><i class="flaticon-heart"></i>
                              <span class="count">(2)</span>
                            </a>
                          </li>
                          <li @click.prevent="activeCart">
                            <a href="#0" class="number">
                              <i class="flaticon-shopping-cart"></i
                              ><span
                                class="count"
                                v-if="productsCart.length > 0"
                                >({{ productsCart.length }})
                              </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a href="shop-grid.html" class="offer-link"> Offer </a>
          </div>
        </div>
      </div>
    </div>

    <div class="sticy-header">
      <div class="mobile-menu d-lg-none d-block">
        <div class="mobile-menu__menu-top border-bottom-0">
          <div class="container">
            <div class="row">
              <div
                class="menu-info d-flex justify-content-between align-items-center"
              >
                <div class="menubar">
                  <span></span> <span></span>
                  <span></span>
                </div>
                <a href="index.html" class="logo">
                  <img src="assets/images/logo/logo.png" alt="" />
                </a>
                <div class="cart-holder">
                  <a href="#0" class="cart cart-icon position-relative">
                    <i class="flaticon-shopping-cart"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container position-relative d-lg-block d-none">
        <div class="d-flex align-items-center justify-content-between">
          <a href="index.html" class="logo me-2">
            <img src="assets/images/logo/logo.png" alt="" />
          </a>
          <div class="mega-menu-default mega-menu d-lg-block d-none">
            <div class="container">
              <div class="row">
                <nav>
                  <ul
                    class="page-dropdown-menu d-flex align-items-center justify-content-center"
                  >
                    <li class="dropdown-list">
                      <router-link to="/"><span>Home</span></router-link>
                    </li>
                    <li class="dropdown-list">
                      <router-link to="/products"
                        ><span>Продукты</span>
                      </router-link>
                    </li>
                    <li class="dropdown-list" @click.prevent="activeCart">
                      <a href="#0" class="number"
                        ><i class="flaticon-shopping-cart"></i
                        ><span class="count" v-if="productsCart.length > 0"
                          >({{ productsCart.length }})</span
                        >
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      @click="disActiveCart"
      class="side-cart-closer"
      v-bind:class="{ active: isActive }"
    ></div>
    <!--            <div v-on:mouseover="isActive = !isActive" v-bind:class="{ active: isActive }"-->
    <!--            <div v-bind:class="{ active: isActive }"-->
    <div
      v-bind:class="{ active: isActive }"
      class="side-cart d-flex flex-column justify-content-between"
    >
      <div class="top">
        <div class="content d-flex justify-content-between align-items-center">
          <h6 class="text-uppercase">Your Cart (03)</h6>
          <span @click="disActiveCart" class="cart-close text-uppercase"
            >X</span
          >
        </div>
        <div class="cart_items">
          <div
            v-for="(cart, idx) in productsCart"
            :key="idx"
            class="items d-flex justify-content-between align-items-center"
          >
            <template v-for="product in products">
              <template v-if="cart.id === product.id">
                <div class="left d-flex align-items-center" :key="product.id">
                  <a
                    href="shop-details-1.html"
                    class="thumb d-flex justify-content-between align-items-center"
                  >
                    <img :src="product.image_url" alt="" />
                  </a>
                  <div class="text">
                    <a href="shop-details-1.html">
                      <h6>{{ product.title }}</h6>
                    </a>
                    <p>
                      {{ cart.qty }} X
                      <span>{{ cart.price }} руб</span>
                    </p>
                  </div>
                </div>
              </template>
            </template>
            <div class="right">
              <div class="item-remove">
                <i
                  @click.prevent="removeProduct(cart.id)"
                  class="flaticon-cross"
                ></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom">
        <div
          class="total-ammount d-flex justify-content-between align-items-center"
        >
          <h6 class="text-uppercase">Итого:</h6>
          <h6 class="ammount text-uppercase">
            {{ productsCart ? totalPrice : '0' }} .руб
          </h6>
        </div>
        <div class="button-box d-flex justify-content-between">
          <a href="/cart" class="btn_black"> Смотреть корзину </a>
          <a @click.prevent="clearCart" href="/cart" class="button-2 btn_theme">
            Очистить корзину
          </a>
        </div>
      </div>
    </div>
    <div class="sidebar-content-closer"></div>
    <div class="sidebar-content">
      <div class="sidebar-widget-container">
        <div
          class="widget-heading d-flex justify-content-end align-content-center"
        >
          <span class="close-side-widget">X</span>
        </div>
        <div class="sidebar-textwidget">
          <div class="sidebar-info-contents">
            <div class="content-inner">
              <div class="logo">
                <a href="/"><img src="assets/images/logo/logo.png" alt="" /></a>
              </div>
              <div class="content-box">
                <h4>About Us</h4>
                <div class="inner-text">
                  <p>
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s,
                  </p>
                </div>
              </div>
              <div class="form_inner">
                <h4>Support</h4>
                <form action="index.html" method="post">
                  <div class="form-group mt-4">
                    <input
                      type="text"
                      name="name"
                      placeholder="Name"
                      required=""
                    />
                  </div>
                  <div class="form-group mt-4">
                    <input
                      type="email"
                      name="email"
                      placeholder="Email"
                      required=""
                    />
                  </div>
                  <div class="form-group mt-4">
                    <textarea
                      name="message"
                      placeholder="Message..."
                    ></textarea>
                  </div>
                  <div class="form-group message-btn mt-4">
                    <button type="submit" class="btn--secondary">
                      <span class="txt">Submit Now</span>
                    </button>
                  </div>
                </form>
              </div>
              <div class="sidebar-contact-info">
                <h4>Contact Info</h4>
                <ul>
                  <li>
                    <span class="flaticon-pin-1"></span>
                    New York, United States
                  </li>
                  <li>
                    <span class="flaticon-telephone"></span>
                    <a href="tel:+44203700001">+44 123 456 789</a>
                  </li>
                  <li>
                    <span class="flaticon-mail"></span>
                    <a href="mailto:info@example.com">info@example.com</a>
                  </li>
                </ul>
              </div>
              <div class="thm-medio-boxx1">
                <ul class="social-box">
                  <li class="facebook">
                    <a href="https://www.facebook.com/" target="_blank"
                      ><i class="flaticon-facebook-app-symbol"></i
                    ></a>
                  </li>
                  <li class="twitter">
                    <a href="https://twitter.com/" target="_blank"
                      ><i class="flaticon-twitter"></i
                    ></a>
                  </li>
                  <li class="instagram">
                    <a href="https://www.instagram.com/" target="_blank"
                      ><i class="flaticon-instagram"></i
                    ></a>
                  </li>
                  <li class="youtube">
                    <a href="https://www.youtube.com/" target="_blank"
                      ><i class="flaticon-youtube"></i
                    ></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  props: ['productsCart', 'products', 'totalPrice'],

  mounted() {
    $(document).trigger('changed');
    this.productsCart;
  },

  data() {
    return {
      name: '',
      email: '',
      adress: '',
      isActive: false,
    };
  },

  methods: {
    activeCart() {
      this.isActive = true;
    },

    disActiveCart() {
      this.isActive = false;
    },

    removeProduct(id) {
      this.$emit('removeProduct', id);
    },

    clearCart() {
      this.$emit('clearCart');
    },
  },
  watch: {
    // productsCart: function (newVal, oldVal) {
    //   // watch it
    //   console.log('Prop changed: ', newVal, ' | was: ', oldVal);
    // },
    // productsCart: {
    //   handler() {
    //     localStorage.setItem('cart', JSON.stringify(this.productsCart));
    //     console.log('TheHeader');
    //   },
    //   deep: true,
    // },
  },
};
</script>

<style scoped></style>
