<template>
  <main class="overflow-hidden">
    <!--Start Breadcrumb Style2-->
    <section
      class="breadcrumb-area"
      style="background-image: url(assets/images/inner-pages/breadcum-bg.png)"
    >
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="breadcrumb-content text-center wow fadeInUp animated">
              <h2>Cart</h2>
              <div class="breadcrumb-menu">
                <ul>
                  <li>
                    <a href="index.html"
                      ><i class="flaticon-home pe-2"></i>Home</a
                    >
                  </li>
                  <li><i class="flaticon-next"></i></li>
                  <li class="active">Cart</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Breadcrumb Style2-->
    <!--Start cart area-->
    <section class="cart-area pt-120 pb-120">
      <div class="container">
        <div class="cart-button-box">
          <div class="apply-coupon wow fadeInUp animated">
            <div class="apply-coupon-button">
              <button
                @click.prevent="clearCart"
                class="btn--primary style2"
                type="submit"
              >
                Очистить корзину
              </button>
            </div>
          </div>
        </div>
        <div class="row wow fadeInUp animated">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="cart-table-box">
              <div class="table-outer">
                <table class="cart-table">
                  <thead class="cart-header">
                    <tr>
                      <th class="">Product Name</th>
                      <th class="price">Price</th>
                      <th>Quantity</th>
                      <th>Subtotal</th>
                      <th class="hide-me"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-for="(cart, idx) in productsCart" :key="idx">
                      <tr>
                        <template v-for="product in products">
                          <template v-if="cart.id === product.id">
                            <td :key="product.id">
                              <div class="thumb-box">
                                <a href="shop-details-1.html" class="thumb">
                                  <img
                                    :src="product.image_url"
                                    class="img-thumbnail"
                                    alt=""
                                  />
                                </a>
                                <router-link :to="'products/' + product.id">
                                  <h5>
                                    {{ product.title }}
                                  </h5>
                                </router-link>
                              </div>
                            </td>
                            <td :key="product.id">
                              {{ product.price }}
                              руб
                            </td>
                            <td class="qty" :key="product.id">
                              <div class="qtySelector text-center">
                                <span
                                  v-if="cart.qty > 1"
                                  @click.prevent="minusQty(idx)"
                                  class="decreaseQty"
                                >
                                  <i class="flaticon-minus"></i>
                                </span>
                                <span
                                  v-else
                                  @click.prevent="removeProduct(cart.id)"
                                  class="decreaseQty"
                                >
                                  <i class="flaticon-minus"></i>
                                </span>
                                <!-- :value="cart.qty" -->
                                <!-- v-model="cart.qty" -->
                                <input v-model="cart.qty" type="number" />
                                <span
                                  @click.prevent="plusQty(idx)"
                                  class="increaseQty"
                                  ><i class="flaticon-plus"></i
                                ></span>
                              </div>
                            </td>
                            <td class="sub-total" :key="product.id">
                              {{ cart.price * cart.qty }}
                              руб
                            </td>
                            <td :key="product.id">
                              <div class="remove">
                                <i
                                  @click.prevent="removeProduct(cart.id)"
                                  class="flaticon-cross"
                                ></i>
                              </div>
                            </td>
                          </template>
                        </template>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="cart-button-box">
              <div class="apply-coupon wow fadeInUp animated">
                <div class="apply-coupon-input-box mt-30">
                  <input
                    type="text"
                    name="coupon-code"
                    value=""
                    placeholder="Coupon Code"
                  />
                </div>
                <div class="apply-coupon-button mt-30">
                  <button class="btn--primary style2" type="submit">
                    Apply Coupon
                  </button>
                </div>
              </div>
              <div class="cart-button-box-right wow fadeInUp animated">
                <button class="btn--primary mt-30" type="submit">
                  Continue Shopping
                </button>
                <button class="btn--primary mt-30" type="submit">
                  Update Cart
                </button>
              </div>
            </div>
          </div>
          <div class="row pt-120">
            <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
              <div class="cart-total-box">
                <div class="inner-title">
                  <h3>Оформление заказа</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-8 col-md-9 mt-30">
            <div
              class="login-register-form"
              style="
                background-image: url('assets/images/inner-pages/login-bg.png');
              "
            >
              <div class="top-title text-center">
                <h3>Введите данные для оформления заказа</h3>
              </div>
              <form class="common-form">
                <div class="form-group eye">
                  <input
                    type="text"
                    v-model="name"
                    class="form-control"
                    placeholder="name"
                  />
                </div>
                <div class="form-group eye">
                  <input
                    type="text"
                    v-model="email"
                    class="form-control"
                    placeholder="email"
                  />
                </div>
                <div class="form-group eye">
                  <input
                    type="text"
                    v-model="adress"
                    class="form-control"
                    placeholder="adress"
                  />
                </div>
                <div class="mt-30">
                  <button
                    @click.prevent="storeOrder()"
                    type="submit"
                    class="btn--primary style2 mt-10"
                  >
                    Оформить
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-120">
          <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
            <div class="cart-total-box">
              <div class="inner-title">
                <h3>Cart Totals</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt--30">
          <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
            <div class="cart-total-box mt-30">
              <div class="table-outer">
                <table class="cart-table2">
                  <thead class="cart-header clearfix">
                    <tr>
                      <th colspan="1" class="shipping-title">Shipping</th>
                      <th class="price">$2500.00</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="shipping">Shipping</td>
                      <td class="selact-box1">
                        <ul class="shop-select-option-box-1">
                          <li>
                            <input
                              type="checkbox"
                              name="free_shipping"
                              id="option_1"
                              checked=""
                            />
                            <label for="option_1"
                              ><span></span>Free Shipping</label
                            >
                          </li>
                          <li>
                            <input
                              type="checkbox"
                              name="flat_rate"
                              id="option_2"
                            />
                            <label for="option_2"><span></span>Flat Rate</label>
                          </li>
                          <li>
                            <input
                              type="checkbox"
                              name="local_pickup"
                              id="option_3"
                            />
                            <label for="option_3"
                              ><span></span>Local Pickup</label
                            >
                          </li>
                        </ul>
                        <div class="inner-text">
                          <p>
                            Shipping options will be updated during checkout
                          </p>
                        </div>
                        <h4>Calculate Shipping</h4>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <h4 class="total">Total</h4>
                      </td>
                      <td class="subtotal">$2500.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
            <div class="cart-check-out mt-30">
              <h3>Check Out</h3>
              <ul class="cart-check-out-list">
                <li>
                  <div class="left">
                    <p>Subtotal</p>
                  </div>
                  <div class="right">
                    <p>$2500.00</p>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <p>Shipping</p>
                  </div>
                  <div class="right">
                    <p><span>Flat rate:</span> $50.00</p>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <p>Total Price:</p>
                  </div>
                  <div class="right">
                    <p>{{ totalPrice }} .руб</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row"></div>
      </div>
    </section>
    <!--End cart area-->
  </main>
</template>

<script>
export default {
  name: 'index',

  props: ['addToCart', 'productsCart'],

  data() {
    return {
      products: [],
      name: '',
      email: '',
      adress: '',
      interval: null,
    };
  },

  mounted() {
    this.getProducts(), this.getCartProducts();
  },

  computed: {
    totalPrice() {
      let total = 0;
      this.productsCart
        ? this.productsCart.forEach((productsCart) => {
            [(total += productsCart.price * productsCart.qty)];
          })
        : 0;
      return total;
    },
  },

  created: function () {
    window.addEventListener('storage', () => {
      this.getCartProducts();
      console.log(11111111);
    });
  },

  methods: {
    getProducts() {
      this.axios
        .post('http://127.0.0.1:8000/api/cart')
        .then((res) => {
          this.products = res.data.data;
          console.log(res);
        })
        .finally((v) => {
          $(document).trigger('changed');
        });
    },
    storeOrder() {
      this.axios
        .post('http://127.0.0.1:8000/api/orders', {
          products: this.productsCart,
          name: this.name,
          email: this.email,
          adress: this.adress,
          total_price: this.totalPrice,
        })
        .then((res) => {
          // this.productsCart = res.data.data
          console.log(res);
        })
        .finally((v) => {
          $(document).trigger('changed');
        });
    },

    getCartProducts() {
      JSON.parse(localStorage.getItem('cart').length) < 3 ||
      !JSON.parse(localStorage.getItem('cart'))
        ? this.getProducts
        : (this.productsCart = JSON.parse(localStorage.getItem('cart')));

      console.log(this.productsCart);
    },
    minusQty(id) {
      this.productsCart[id].qty -= 1;
    },

    plusQty(id) {
      this.productsCart[id].qty += 1;
    },

    removeProduct(id) {
      this.$emit('removeProduct', id);
    },

    clearCart() {
      this.$emit('clearCart');
    },
  },

  watch: {
    productsCart: {
      handler() {
        localStorage.setItem('cart', JSON.stringify(this.productsCart));
        window.addEventListener('storage', () => {
          this.getCartProducts();
          console.log(222222);
        });
      },
      deep: true,
    },
  },
};
</script>

<style scoped></style>