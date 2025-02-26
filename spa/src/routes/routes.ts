import { routes } from "@/constants/routes";
import { Auth, Home } from "@/pages";
export const publicRoutes = [
  {
    path: routes.AUTH,
    element: Auth,
  },
];

export const privateRoutes = [
  {
    path: routes.HOME,
    element: Home,
  },
];
