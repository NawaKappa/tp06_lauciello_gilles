import { Component, OnInit } from "@angular/core";
import { Store } from "@ngxs/store";
import { Observable } from "rxjs";
import {
  AddProductToBasket,
  DelProductFromBasket
} from "../shared/actions/productAction";
import { BasketHelperService } from "../services/basket-helper.service";
import { ProductState } from "../shared/states/ProductState";
import { Product } from '../shared/Models/product';

@Component({
  selector: "app-basket",
  templateUrl: "./basket.component.html",
  styleUrls: ["./basket.component.css"]
})
export class BasketComponent implements OnInit {
  constructor(private store: Store) {}

  listProducts$: Observable<Product[]>;

  ngOnInit() {
    this.listProducts$ = this.store.select(ProductState.getProductsInBasket);
  }

  onClickDelFromBasket(product: Product) {
    this.store.dispatch(new DelProductFromBasket(product));
  }
}
