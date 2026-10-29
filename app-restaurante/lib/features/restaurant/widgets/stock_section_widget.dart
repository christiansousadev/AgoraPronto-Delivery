import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:fastdelivery_multivendor_restaurant/common/widgets/custom_dropdown_widget.dart';
import 'package:fastdelivery_multivendor_restaurant/common/widgets/custom_text_form_field_widget.dart';
import 'package:fastdelivery_multivendor_restaurant/features/restaurant/controllers/restaurant_controller.dart';
import 'package:fastdelivery_multivendor_restaurant/util/dimensions.dart';
import 'package:fastdelivery_multivendor_restaurant/util/styles.dart';
class StackSectionWidget extends StatelessWidget {
  final RestaurantController restaurantController;
  final TextEditingController stockTextController;
  const StackSectionWidget({super.key, required this.restaurantController, required this.stockTextController});

  @override
  Widget build(BuildContext context) {
    List<DropdownItem<int>> stockTypeList = _generateStockTypeList(restaurantController.stockTypeList, context);

    // if(restaurantController.variationList!.isEmpty) {
    //   restaurantController.setStockFieldDisable(false, notify: false);
    // } else {
    //   restaurantController.setStockFieldDisable(true, notify: false);
    // }


    return Row(children: [

      Expanded(child: Column(crossAxisAlignment: CrossAxisAlignment.start, children: [

        Container(
          decoration: BoxDecoration(
              borderRadius: BorderRadius.circular(Dimensions.radiusDefault),
              color: Theme.of(context).cardColor,
              border: Border.all(color: Theme.of(context).disabledColor, width: 0.3)
          ),
          child: CustomDropdownWidget<int>(
            icon: Icon(Icons.keyboard_arrow_down, color: Theme.of(context).disabledColor),
            onChange: (int? value, int index) {
              restaurantController.setStockTypeIndex(index, true);
              // if(restaurantController.stockTypeIndex == 0 ) {
              //   stockTextController.text = 'unlimited'.tr;
              // } else {
                stockTextController.text = '';
              // }
            },
            dropdownButtonStyle: DropdownButtonStyle(
              height: 50,
              padding: const EdgeInsets.symmetric(
                vertical: Dimensions.paddingSizeExtraSmall,
                horizontal: Dimensions.paddingSizeExtraSmall,
              ),
              primaryColor: Theme.of(context).textTheme.bodyLarge!.color,
            ),
            dropdownStyle: DropdownStyle(
              elevation: 10,
              borderRadius: BorderRadius.circular(Dimensions.radiusDefault),
              padding: const EdgeInsets.all(Dimensions.paddingSizeExtraSmall),
            ),
            items: stockTypeList,
            child: Text(
              restaurantController.stockTypeList[restaurantController.stockTypeIndex!]!.tr,
              style: robotoRegular.copyWith(color: Theme.of(context).textTheme.bodyMedium!.color),
            ),
          ),
        )

      ])),
      const SizedBox(width: Dimensions.paddingSizeSmall),

      Expanded(child: Column(crossAxisAlignment: CrossAxisAlignment.start, children: [

        CustomTextFormFieldWidget(
          hintText: restaurantController.stockTypeIndex == 0 ? 'unlimited'.tr : 'food_stock'.tr,
          controller: stockTextController,
          inputAction: TextInputAction.done,
          inputType: TextInputType.phone,
          showTitle: false,
          readOnly: restaurantController.stockTypeIndex == 0 || (restaurantController.stockTextFieldDisable) ? true : false,
        ),

      ])),

    ]);
  }

  List<DropdownItem<int>> _generateStockTypeList(List<String?> typeList, BuildContext context) {
    List<DropdownItem<int>> generateDmTypeList = [];
    for(int index=0; index<typeList.length; index++) {
      generateDmTypeList.add(DropdownItem<int>(value: index, child: SizedBox(
        child: Padding(
          padding: const EdgeInsets.all(8.0),
          child: Text(
            '${typeList[index]?.tr}',
            style: robotoRegular.copyWith(color: Theme.of(context).textTheme.bodyMedium!.color),
          ),
        ),
      )));
    }
    return generateDmTypeList;
  }
}
