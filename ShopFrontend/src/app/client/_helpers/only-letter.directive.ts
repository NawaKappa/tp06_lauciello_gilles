import { Directive, Input } from "@angular/core";
import {
  AbstractControl,
  FormGroup,
  NG_VALIDATORS,
  ValidationErrors,
  Validator,
  ValidatorFn
} from "@angular/forms";
import { onlyLetterValidator } from "./only-letter.validator";

@Directive({
  selector: "[onlyLetter]",
  providers: [
    { provide: NG_VALIDATORS, useExisting: OnlyLetterDirective, multi: true }
  ]
})
export class OnlyLetterDirective implements Validator {
  @Input("onlyLetter") any: any;

  validate(control: AbstractControl): { [key: string]: any } | null {
    return onlyLetterValidator()(control);
  }
}
