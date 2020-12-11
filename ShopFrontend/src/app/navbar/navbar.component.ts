import { Component, OnInit } from "@angular/core";
import { BehaviorSubject, Observable, of, Subscription } from "rxjs";
import { Store } from "@ngxs/store";
import { ProductState } from "../shared/states/ProductState";
import { ClientApiService } from '../services/client-api.service';
import { catchError, map } from 'rxjs/operators';

@Component({
  selector: "app-navbar",
  templateUrl: "./navbar.component.html",
  styleUrls: ["./navbar.component.css"]
})
export class NavbarComponent implements OnInit {
  constructor(private store: Store, private service: ClientApiService) {}

  nbProductsInBasket$: Observable<number>;
  subscription: Subscription;
  isConnected$: boolean = true;

  ngOnInit() {
    this.nbProductsInBasket$ = this.store.select(
      ProductState.getNbProductsInBasket
    );
  
  } 

  loggedIn() {
    return localStorage.getItem("tokenUser") ? true : false;
  }

  deconnexion()
  {
    this.service.logout();
  }

}
