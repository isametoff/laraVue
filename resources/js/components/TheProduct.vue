<template>
  <main class="overflow-hidden">
    <!--Start Breadcrumb Style2-->
    <div
      class="breadcrumb-area"
      style="background-image: url(assets/images/inner-pages/breadcum-bg.png)"
    >
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div
              class="breadcrumb-content pb-60 text-center wow fadeInUp animated"
            >
              <h2>Shop Grid</h2>
              <div class="breadcrumb-menu">
                <ul>
                  <li>
                    <router-link to="/"
                      ><i class="flaticon-home pe-2"></i>Home</router-link
                    >
                  </li>
                  <li><i class="flaticon-next"></i></li>
                  <li class="active">Shop Grid</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End Breadcrumb Style2-->
    <!--Start Product Categories One-->
    <section class="product-categories-one pb-60">
      <div class="container">
        <div class="row wow fadeInUp animated">
          <div class="col-xl-12">
            <div class="product-categories-one__inner">
              <ul>
                <li
                  v-for="category in filterList.categories"
                  :key="category.id"
                >
                  <a
                    @click.prevent="addCategories(category.id)"
                    :href="`#${category.id}`"
                    class="img-box"
                  >
                    <div class="inner">
                      <img
                        src="/assets/images/shop/product-categories-v1-img1.png"
                        alt=""
                      />
                    </div>
                  </a>
                  <div class="title">
                    <a
                      @click.prevent="addCategories(category.id)"
                      :href="`#${category.id}`"
                    >
                      <h6>{{ category.title }}</h6>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Product Categories One-->
    <!--Start product-grid-->
    <div class="product-grid pt-60 pb-120">
      <div class="container">
        <div class="row gx-4">
          <div class="col-xl-9 col-lg-8">
            <div class="row">
              <div class="col-xl-12">
                <div
                  class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center"
                >
                  <div class="left-box wow fadeInUp animated">
                    <p>
                      Показано
                      <template v-if="perPage > pagination.total"
                        >{{ pagination.total }}
                      </template>
                      <template v-else> {{ perPage }}</template>
                      из {{ pagination.total }} товаров
                    </p>
                  </div>
                  <div
                    class="right-box justify-content-md-between justify-content-center wow fadeInUp animated"
                  >
                    <div class="short-by">
                      <div class="select-box">
                        <div class="nice-select wide" tabindex="0">
                          <span class="current">Сортировка</span>
                          <ul class="list">
                            <li
                              data-value="Featured"
                              data-display="Short by latest"
                              class="option selected focus"
                            >
                              Featured
                            </li>
                            <li
                              @click.prevent="
                                getProducts(
                                  (sortItem = 'created_at'),
                                  (itemSort = 'DESC')
                                )
                              "
                              data-value="1"
                              class="option"
                            >
                              По новизне
                            </li>
                            <li
                              @click.prevent="
                                getProducts(
                                  (sortItem = 'price'),
                                  (itemSort = 'DESC')
                                )
                              "
                              data-value="2"
                              class="option"
                            >
                              По цене ↓
                            </li>
                            <li
                              @click.prevent="
                                getProducts(
                                  (sortItem = 'price'),
                                  (itemSort = 'ASC')
                                )
                              "
                              data-value="3"
                              class="option"
                            >
                              По цене ↑
                            </li>
                            <li
                              @click.prevent="
                                getProducts(
                                  (sortItem = 'count'),
                                  (itemSort = 'DESC')
                                )
                              "
                              data-value="4"
                              class="option"
                            >
                              По количеству ↓
                            </li>
                            <li
                              @click.prevent="
                                getProducts(
                                  (sortItem = 'count'),
                                  (itemSort = 'ASC')
                                )
                              "
                              data-value="5"
                              class="option"
                            >
                              По количеству ↑
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div
                      class="product-view-style d-flex justify-content-md-between justify-content-center"
                    >
                      <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button
                            class="nav-link active"
                            id="pills-grid-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-grid"
                            type="button"
                            role="tab"
                            aria-selected="true"
                          >
                            <i class="flaticon-grid"></i>
                          </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button
                            class="nav-link"
                            id="pills-list-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-list"
                            type="button"
                            role="tab"
                            aria-selected="false"
                          >
                            <i class="flaticon-list"></i>
                          </button>
                        </li>
                      </ul>
                      <button class="slidebarfilter d-lg-none d-flex">
                        <i class="flaticon-edit"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                  <div
                    class="tab-pane fade show active"
                    id="pills-grid"
                    role="tabpanel"
                    aria-labelledby="pills-grid-tab"
                  >
                    <div class="row">
                      <div
                        v-for="product in products"
                        :key="product.id"
                        class="col-xl-4 col-lg-6 col-6"
                      >
                        <div class="products-three-single w-100 mt-30">
                          <div class="products-three-single-img">
                            <a href="shop-details-3.html" class="d-block">
                              <img
                                :src="product.image_url"
                                class="first-img"
                                alt=""
                              />
                              <img
                                :src="product.image_url"
                                alt=""
                                class="hover-img"
                              />
                            </a>
                            <div class="products-grid-one__badge-box">
                              <span class="bg_base badge new">New</span>
                            </div>
                            <!-- addToCart(product.id, true, product.price) -->
                            <a
                              @click.prevent="
                                addToCart(product.id, 1, product.price)
                              "
                              href="cart.html"
                              class="addcart btn--primary style2"
                            >
                              Add To Cart
                              {{
                                productsCart.length > 0
                                  ? productsCart[0].qty
                                  : 0
                              }}
                            </a>
                            <div class="products-grid__usefull-links">
                              <ul>
                                <li>
                                  <a href="wishlist.html">
                                    <i class="flaticon-heart"> </i>
                                    <span>wishlist</span>
                                  </a>
                                </li>
                                <li>
                                  <a href="compare.html">
                                    <i
                                      class="flaticon-left-and-right-arrows"
                                    ></i>
                                    <span>compare</span>
                                  </a>
                                </li>
                                <li>
                                  <a
                                    :href="`#popup${product.id}`"
                                    @click="getProduct(product.id)"
                                    class="popup_link"
                                  >
                                    <i class="flaticon-visibility"></i>
                                    <span> quick view</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div
                            :id="`popup${product.id}`"
                            class="product-gird__quick-view-popup mfp-hide"
                          >
                            <div v-if="popupProduct" class="container">
                              <div
                                class="row justify-content-between align-items-center"
                              >
                                <div class="col-lg-6">
                                  <div class="quick-view__left-content">
                                    <div class="tabs">
                                      <div class="popup-product-thumb-box">
                                        <ul>
                                          <li
                                            v-for="(
                                              productImage, index
                                            ) in popupProduct.product_images"
                                            :key="index"
                                            class="tab-nav popup-product-thumb"
                                          >
                                            <a :href="`#tabb${index}`">
                                              <img
                                                :src="productImage.url"
                                                alt=""
                                              />
                                            </a>
                                          </li>
                                        </ul>
                                      </div>
                                      <div class="popup-product-main-image-box">
                                        <div
                                          v-for="(
                                            productImage, index
                                          ) in popupProduct.product_images"
                                          :key="index"
                                          :id="`tabb${index}`"
                                          class="tab-item popup-product-image"
                                        >
                                          <div
                                            class="popup-product-single-image"
                                          >
                                            <img
                                              :src="productImage.url"
                                              alt=""
                                            />
                                          </div>
                                        </div>
                                        <button class="prev">
                                          <i class="flaticon-back"></i>
                                        </button>
                                        <button class="next">
                                          <i class="flaticon-next"></i>
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="popup-right-content">
                                    <h3>{{ popupProduct.title }}</h3>
                                    <div class="ratting">
                                      <i class="flaticon-star"></i>
                                      <i class="flaticon-star"></i>
                                      <i class="flaticon-star"></i>
                                      <i class="flaticon-star"></i>
                                      <i class="flaticon-star"></i>
                                      <span>(112)</span>
                                    </div>
                                    <p class="text">
                                      {{ popupProduct.description }}
                                    </p>
                                    <div class="price">
                                      <h2>
                                        {{ popupProduct.price }} ₽
                                        <del>
                                          {{ popupProduct.old_price }} ₽
                                        </del>
                                      </h2>
                                      <h6>Старая цена</h6>
                                    </div>
                                    <div class="color-varient">
                                      <tamplate
                                        v-for="groupProduct in popupProduct.group_products"
                                        :key="groupProduct.id"
                                      >
                                        <tamplate
                                          @click.prevent="
                                            getProduct(groupProduct.id)
                                          "
                                          v-for="color in groupProduct.colors"
                                          :key="color.id"
                                        >
                                          <a
                                            v-if="
                                              groupProduct.id ===
                                              popupProduct.id
                                            "
                                            href="#0"
                                            class="color-box shadow"
                                            :style="{
                                              backgroundColor: color.hex_code,
                                            }"
                                          >
                                            <span>{{ color.title }}</span>
                                          </a>
                                        </tamplate>
                                      </tamplate>
                                    </div>
                                    <div class="add-product">
                                      <div class="button-group">
                                        <div class="qtySelector text-center">
                                          <span
                                            class="decreaseQty"
                                            @click.prevent="minusQty()"
                                            ><i class="flaticon-minus"></i>
                                          </span>
                                          <input v-model="qtyValue" />
                                          <span
                                            class="increaseQty"
                                            @click.prevent="plusQty()"
                                          >
                                            <i class="flaticon-plus"></i>
                                          </span>
                                        </div>
                                        <button
                                          @click.prevent="
                                            addToCart(
                                              product.id,
                                              qtyValue,
                                              product.price
                                            )
                                          "
                                          class="btn--primary"
                                        >
                                          Add to Cart
                                        </button>
                                      </div>
                                    </div>
                                    <div class="payment-method">
                                      <a href="#0">
                                        <img
                                          src="/src/assets/images/payment_method/method_1.png"
                                          alt=""
                                        />
                                      </a>
                                      <a href="#0">
                                        <img
                                          src="/src/assets/images/payment_method/method_2.png"
                                          alt=""
                                        />
                                      </a>
                                      <a href="#0">
                                        <img
                                          src="/src/assets/images/payment_method/method_3.png"
                                          alt=""
                                        />
                                      </a>
                                      <a href="#0">
                                        <img
                                          src="/src/assets/images/payment_method/method_4.png"
                                          alt=""
                                        />
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div
                            class="products-three-single-content text-center"
                          >
                            <span>
                              {{ product.category.title }}
                            </span>
                            <h5>
                              <router-link
                                :to="{
                                  name: 'products.show',
                                  params: { id: product.id },
                                }"
                              >
                                {{ product.title }}
                              </router-link>
                            </h5>
                            <p>
                              <del>{{ product.old_price }} ₽</del>
                              {{ product.price }} ₽
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div
                class="col-12 d-flex justify-content-center wow fadeInUp animated"
              >
                <div class="footer-input-box">
                  <button
                    v-if="pagination.to < pagination.total"
                    @click="getProducts((perPage += 12))"
                    type="submit"
                    class="subscribe_btn"
                  >
                    Показать ещё
                  </button>
                  <button
                    v-else
                    @click="getProducts((perPage = 6))"
                    type="submit"
                    class="subscribe_btn"
                  >
                    Показать меньше
                  </button>
                </div>
              </div>
            </div>
            <div v-if="pagination.last_page > 1" class="row">
              <div
                class="col-12 d-flex justify-content-center wow fadeInUp animated"
              >
                <ul class="pagination text-center">
                  <li v-if="pagination.current_page !== 1" class="next">
                    <a @click="getProducts((page -= 1))" href="#0">
                      <i class="flaticon-left-arrows" aria-hidden="true"></i
                    ></a>
                  </li>
                  <li v-for="(link, idx) in pagination.links" :key="idx">
                    <template
                      v-if="
                        (Number(link.label) &&
                          pagination.current_page - link.label < 2 &&
                          pagination.current_page - link.label > -2) ||
                        Number(link.label) === 1 ||
                        Number(link.label) === pagination.last_page
                      "
                    >
                      <a
                        @click.prevent="getProducts((page = link.label))"
                        :class="link.active ? 'active' : ''"
                        href="#0"
                        >{{ link.label }}
                      </a>
                    </template>
                    <template
                      v-if="
                        (Number(link.label) &&
                          pagination.current_page !== 3 &&
                          pagination.current_page - link.label === 2) ||
                        (Number(link.label) &&
                          pagination.current_page !==
                            pagination.last_page - 2 &&
                          pagination.current_page - link.label === -2)
                      "
                    >
                      <a>...</a>
                    </template>
                  </li>
                  <li
                    v-if="pagination.current_page !== pagination.last_page"
                    class="next"
                  >
                    <a @click.prevent="getProducts((page += 1))" href="#0">
                      <i class="flaticon-next-1" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4">
            <div class="shop-grid-sidebar">
              <button class="remove-sidebar d-lg-none d-block">
                <i class="flaticon-cross"> </i>
              </button>
              <div class="sidebar-holder">
                <form
                  action="#0"
                  class="footer-default__subscrib-form m-0 p-0 wow fadeInUp animated"
                >
                  <div class="footer-input-box p-0">
                    <input
                      type="email"
                      placeholder="Email address"
                      name="email"
                    />
                    <button type="submit" class="subscribe_btn">
                      <i class="flaticon-magnifying-glass"></i>
                    </button>
                  </div>
                </form>
                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                  <h4>Категории</h4>
                  <div class="checkbox-item">
                    <form>
                      <template
                        v-for="category in filterList.categories"
                        :key="category.id"
                      >
                        <div class="form-group">
                          <input
                            @click.prevent="addCategories(category.id)"
                            type="checkbox"
                            :value="category.id"
                            v-model="categories"
                            :id="category.id"
                          />
                          <label :for="category.id">{{ category.title }}</label>
                        </div>
                      </template>
                    </form>
                  </div>
                </div>
                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                  <h4>
                    Выбор цвета {{ colors.length > 0 ? colors.length : '' }}
                  </h4>
                  <ul class="color-option">
                    <li v-for="color in filterList.colors" :key="color.id">
                      <a
                        class="color-option-single shadow"
                        :class="{
                          'border border-4 border-dark': colors.includes(
                            color.id
                          ),
                        }"
                        @click.prevent="addColor(color.id)"
                        href="#0"
                        :style="{ backgroundColor: color.hex_code }"
                      >
                        <span>{{ color.title }}</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                  <h4>Фильтровать по цене</h4>
                  <div class="slider-box">
                    <div id="price-range" class="slider"></div>
                    <div class="output-price">
                      <label for="priceRange">Цена:</label>
                      <input type="text" id="priceRange" readonly />
                    </div>
                    <button
                      @click.prevent="filterProducts"
                      class="filterbtn"
                      type="submit"
                    >
                      Фильтр
                    </button>
                  </div>
                </div>
                <div
                  class="single-sidebar-box mt-30 wow fadeInUp animated pb-0 border-bottom-0"
                >
                  <h4>Tags</h4>
                  <ul class="popular-tag">
                    <li v-for="tag in filterList.tags" :key="tag.id">
                      <a
                        @click.prevent="addTag(tag.id)"
                        class="nav-link"
                        :href="`#${tag.id}`"
                        >{{ tag.title }}
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End product-grid-->
  </main>
</template>

<script>
export default {
  name: 'TheProduct',

  props: ['addToCart', 'productsCart'],

  mounted() {
    $(document).trigger('changed');
    this.getProducts();
    this.getFilterList();
  },
  data() {
    return {
      sortItem: 'price',
      itemSort: 'DESC',
      products: [],
      popupProduct: null,
      filterList: [],
      categories: [],
      colors: [],
      tags: [],
      prices: [],
      pagination: [],
      perPage: 12,
      page: 1,
      qtyValue: 1,
    };
  },
  computed: {},

  methods: {
    addToCart(id, isSingle, price) {
      this.$emit('addToCart', id, isSingle, price);
    },

    filterProducts() {
      let prices = $('#priceRange').val();
      this.prices = prices.replace(/[\s+]|[руб.]/g, '').split('-');
      this.getProducts();
    },
    addColor(id) {
      if (!this.colors.includes(id)) {
        this.colors.push(id);
      } else {
        this.colors = this.colors.filter((elem) => {
          return elem !== id;
        });
      }
      this.getProducts();
    },
    addCategories(id) {
      if (!this.categories.includes(id)) {
        this.categories.push(id);
      } else {
        this.categories = this.categories.filter((elem) => {
          return elem !== id;
        });
      }
      this.getProducts();
    },
    addTag(id) {
      if (!this.tags.includes(id)) {
        this.tags.push(id);
      } else {
        this.tags = this.tags.filter((elem) => {
          return elem !== id;
        });
      }
      this.getProducts();
    },
    getProducts() {
      this.axios
        .post('/api/products', {
          categories: this.categories,
          colors: this.colors,
          tags: this.tags,
          prices: this.prices,
          page: this.page,
          perPage: this.perPage,
          sortItem: this.sortItem,
          itemSort: this.itemSort,
        })
        .then((res) => {
          this.products = res.data.data;
          this.pagination = res.data.meta;
          console.log(res);
        })
        .finally((v) => {
          $(document).trigger('changed');
        });
      console.log(this.colors);
    },
    getProduct(id) {
      this.axios
        .get(`/api/products/${id}`)
        .then((res) => {
          this.popupProduct = res.data.data;
          console.log(res);
        })
        .finally((v) => {
          $(document).trigger('changed');
        });
    },

    plusQty() {
      this.qtyValue += 1;
    },

    minusQty() {
      this.qtyValue > 1 ? (this.qtyValue -= 1) : '';
    },

    getFilterList() {
      this.axios
        .get(`/api/products/filters`)
        .then((res) => {
          this.filterList = res.data;
          console.log(res);

          //  Price Filter
          if ($('#price-range').length) {
            $('#price-range').slider({
              range: true,
              min: this.filterList.price.min,
              max: this.filterList.price.max,
              values: [this.filterList.price.min, this.filterList.price.max],
              slide: function (event, ui) {
                $('#priceRange').val(
                  ui.values[0] + 'руб. - ' + ui.values[1] + ' руб.'
                );
              },
            });
            $('#priceRange').val(
              $('#price-range').slider('values', 0) +
                ' руб. - ' +
                $('#price-range').slider('values', 1) +
                'руб. '
            );
          }
        })
        .finally((v) => {
          $(document).trigger('changed');
        });
    },
  },
};
</script>

<style scoped></style>