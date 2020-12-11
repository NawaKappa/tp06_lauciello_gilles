import { Component, OnInit } from "@angular/core";
import { Observable } from "rxjs";
import { map } from "rxjs/operators";
import { BasketHelperService } from "../services/basket-helper.service";
import { ProductApiService } from "../services/product-api.service";
import { Product } from '../shared/Models/product';

@Component({
  selector: "app-catalog",
  templateUrl: "./catalog.component.html",
  styleUrls: ["./catalog.component.css"]
})
export class CatalogComponent implements OnInit {
  products: Observable<Product[]>;
  productsFiltered$: Observable<Product[]>;
  filterInputs: any = {};

  constructor(
    private service: ProductApiService,
    private basketHelper: BasketHelperService
  ) {}

  ngOnInit() {
    this.products = this.service.getProducts();
    this.products.subscribe(r => console.log(r));
    this.productsFiltered$ = this.products;
  }

  onClickAddToBasket(product: Product) {
    this.basketHelper.addProductToBasket(product);
  }

  applyFilters() {
    this.productsFiltered$ = this.products;

    if (this.filterInputs.productName) {
      this.applyProductNameFilter();
    }
    if (this.filterInputs.minPrice) {
      this.applyMinPriceFilter();
    }
    if (this.filterInputs.maxPrice) {
      this.applyMaxPriceFilter();
    }
  }

  applyProductNameFilter() {
    this.productsFiltered$ = this.productsFiltered$.pipe(
      map(data =>
        data.filter(w => w.productName == this.filterInputs.productName)
      )
    );
  }

  applyMinPriceFilter() {
    let minPrice: number = +this.filterInputs.minPrice;
    this.productsFiltered$ = this.productsFiltered$.pipe(
      map(data => data.filter(w => w.price >= minPrice))
    );
  }

  applyMaxPriceFilter() {
    let maxPrice: number = +this.filterInputs.maxPrice;
    this.productsFiltered$ = this.productsFiltered$.pipe(
      map(data => data.filter(w => w.price <= maxPrice))
    );
  }
}
