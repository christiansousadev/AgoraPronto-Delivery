import 'package:fastdelivery_multivendor_restaurant/interface/repository_interface.dart';

abstract class NotificationRepositoryInterface implements RepositoryInterface {
  void saveSeenNotificationCount(int count);
  int? getSeenNotificationCount();
}