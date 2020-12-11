import { NgxsModule, State, Selector, Action, StateContext } from "@ngxs/store";
import { ProductStateModel } from "./ProductStateModel";
import {
  AddProductToBasket,
  DelProductFromBasket
} from "../actions/productAction";
import { Product } from '../Models/product';

@State<ProductStateModel>({
  name: "products",
  defaults: {
    products: [],
    productsInBasket: []
  }
})
export class ProductState {
  @Selector()
  static getProductsInBasket(state: ProductStateModel): Product[] {
    return state.productsInBasket;
  }

  @Selector()
  static getNbProductsInBasket(state: ProductStateModel): number {
    return state.productsInBasket.length;
  }

  @Action(AddProductToBasket)
  add(
    { getState, patchState }: StateContext<ProductStateModel>,
    { payload }: AddProductToBasket
  ) {
    const state = getState();
    patchState({
      productsInBasket: [...state.productsInBasket, payload]
    });
  }

  @Action(DelProductFromBasket)
  del(
    { getState, patchState }: StateContext<ProductStateModel>,
    { payload }: DelProductFromBasket
  ) {
    const state = getState();
    patchState({
      productsInBasket: this.removeFirst(state.productsInBasket, payload)
    });
  }

  private removeFirst(src, element) {
    const index = src.indexOf(element);
    if (index === -1) return src;
    return [...src.slice(0, index), ...src.slice(index + 1)];
  }
}
