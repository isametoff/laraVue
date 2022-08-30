<template>
  <TheHeader
    :totalOrder="totalOrder"
    :productsCart="productsCart"
    :products="products"
    :totalPrice="totalPrice"
    @removeProduct="removeProduct"
    :key="0"
    @clearCart="clearCart"
  />
  <router-view :productsCart="productsCart" @addToCart="addToCart" />
  <TheFooter />
</template>
<script>
import TheHeader from './components/TheHeader.vue';
import TheFooter from './components/TheFooter.vue';
export default {
  name: 'App',

  components: {
    TheHeader,
    TheFooter,
  },

  mounted() {
    $(document).trigger('changed');
    this.getProducts();
    this.getCartProducts();
  },

  data() {
    return {
      products: [],
      productsCart: [],
      isActive: false,
    };
  },

  computed: {
    totalPrice() {
      let total = 0;
      this.productsCart.length > 0
        ? this.productsCart.forEach((productsCart) => {
            [(total += productsCart.price * productsCart.qty)];
          })
        : total;
      return total;
    },
    totalOrder() {
      if (this.productsCart) {
        if (this.productsCart.length > 0) {
          let orders = this.productsCart.length;
          return orders;
        }
      }
      return 0;
    },
  },

  created: function () {
    window.addEventListener('storage', () => {
      this.productsCart = JSON.parse(localStorage.getItem('cart'));
      console.log('addEventListener');
    });
  },

  methods: {
    addToCart(id, isSingle, price) {
      const qty = isSingle ? 1 : $('.qtyValue').val();
      $('.qtyValue').val(1);

      const products = this.productsCart;
      const filteredCarts = products.filter((item) => item.id === id);
      const newProduct = [
        {
          id: id,
          qty: qty,
          price: price,
        },
      ];

      if (this.productsCart.length == 0 || filteredCarts.length < 1) {
        Array.prototype.push.apply(this.productsCart, newProduct);
        console.log('Add');
      } else {
        for (let index = 0; index < this.productsCart.length; index++) {
          if (this.productsCart[index].id == id) {
            this.productsCart[index].qty += 1;
          }
        }
      }
    },

    plusQty(id) {
      this.productsCart[id].qty += 1;
      console.log('App.plusQty');
    },

    activeCart() {
      this.isActive = true;
      this.getCartProducts();
    },

    disActiveCart() {
      this.isActive = false;
    },

    getProducts() {
      this.axios
        .post('/api/cart')
        .then((res) => {
          this.products = res.data.data;
          // console.log(res)
        })
        .finally((v) => {
          $(document).trigger('changed');
        });
    },

    getCartProducts() {
      JSON.parse(localStorage.getItem('cart')) != null
        ? (this.productsCart = JSON.parse(localStorage.getItem('cart')))
        : [];
      console.log(this.productsCart);
    },

    removeProduct(id) {
      this.productsCart = this.productsCart.filter((cart) => {
        return cart.id !== id;
      });
    },

    clearCart() {
      this.productsCart = [];
    },
  },
  watch: {
    productsCart: {
      handler() {
        console.log(this.productsCart);
        localStorage.setItem('cart', JSON.stringify(this.productsCart));
      },
      deep: true,
    },
  },
};
</script>