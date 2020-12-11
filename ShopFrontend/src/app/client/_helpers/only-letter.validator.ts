import { AbstractControl, FormGroup, ValidatorFn } from "@angular/forms";

export function onlyLetterValidator(): ValidatorFn {
  return (control: AbstractControl): { [key: string]: any } | null => {
    const regex = /^[A-Za-z\s]+$/g;
    const forbidden = regex.test(control.value);
    return !forbidden ? { onlyLetter: { value: control.value } } : null;
  };
}
