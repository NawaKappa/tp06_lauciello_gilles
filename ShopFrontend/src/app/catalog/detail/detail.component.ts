import { Component, OnInit } from "@angular/core";
import { ActivatedRoute } from "@angular/router";
import { Observable, of } from "rxjs";
import { map } from "rxjs/operators";
import { Product } from 'src/app/shared/Models/product';
import { BasketHelperService } from "../../services/basket-helper.service";
import { ProductApiService } from "../../services/product-api.service";

@Component({
  selector: "app-detail",
  templateUrl: "./detail.component.html",
  styleUrls: ["./detail.component.css"]
})
export class DetailComponent implements OnInit {
  constructor(
    private route: ActivatedRoute,
    private service: ProductApiService,
    private basketHelper: BasketHelperService
  ) {}

  product$: Observable<Product>;

  ngOnInit() {
    this.route.params.subscribe(params => {
      const id = params["id"];
      this.product$ = this.service.getProductById(id);
    });
  }

  onClickAddToBasket() {
    this.product$.subscribe(v => this.basketHelper.addProductToBasket(v));
  }
}
