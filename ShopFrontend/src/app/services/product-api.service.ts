import { HttpClient, HttpHeaders } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { map } from "rxjs/operators";
import { environment } from "../../environnements/environnement";
import { Product } from '../shared/Models/product';

@Injectable()
export class ProductApiService {
  constructor(private client: HttpClient) {}

  public getProducts(): Observable<Product[]> {
    return this.client.get<Product[]>(environment.backendProducts + "all", {
      headers: new HttpHeaders().set(
        "Authorization",
        localStorage.getItem('tokenUser')
      )});
  }

  public getProductById(id: number): Observable<Product> {
    return this.getProducts().pipe(
      map(products => products.find(product => product.id == id))
    );
  }
}
