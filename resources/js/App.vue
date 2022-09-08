<template>
  <TheHeader
    :key="0"
    :products="products"
    :productsCart="productsCart"
    :totalPrice="totalPrice"
    :totalOrder="totalOrder"
    @removeProduct="removeProduct"
    @clearCart="clearCart"
  />
  <router-view
    :products="products"
    :productsCart="productsCart"
    @addToCart="addToCart"
    @removeProduct="removeProduct"
    @clearCart="clearCart"
    @plusQty="plusQty"
    @minusQty="minusQty"
  />
  <TheFooter />
</template>
<script>
import axios from 'axios';

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
  },

  created: function () {
    window.addEventListener('storage', () => {
      this.productsCart = JSON.parse(localStorage.getItem('cart'));
      console.log('addEventListener');
    });
  },

  methods: {
    addToCart(id, qty, price) {
      
      const filteredCarts = this.productsCart.filter((item) => item.id === id);

      const newProduct = [
        {
          id: id,
          qty: qty,
          price: price,
        },
      ];

      if (this.productsCart.length == 0 || filteredCarts.length < 1) {
        Array.prototype.push.apply(this.productsCart, newProduct);
      } else {
        for (let index = 0; index < this.productsCart.length; index++) {
          if (this.productsCart[index].id == id) {
            this.productsCart[index].qty += qty;
          }
        }
      }
    },

    plusQty(id) {
      this.productsCart[id].qty += 1;
    },

    minusQty(id) {
      this.productsCart[id].qty -= 1;
    },

    activeCart() {
      this.isActive = true;
      this.getCartProducts();
    },

    disActiveCart() {
      this.isActive = false;
    },

    getProducts() {
      axios
        .post('/api/cart')
        .then((res) => {
          this.products = res.data.data;
          console.log(res.data.data);
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